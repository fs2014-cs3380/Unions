<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    private $_id;
    private $_connection;
    private $_entry;
    private $_bind;

    const ERROR_INVALID = 'Access to this site requires a user account or University of Missouri SSO credentials. Please create an account or use your SSO credentials.';
    const ERROR_PAWPRINT_INVALID = 'Invalid pawprint.';
    const ERROR_USER_INVALID = 'Invalid e-mail address.';

    public function authenticate()
    {
        if (preg_match('/^\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,8}$/', $this->username)) {
            $user = User::model()->find('LOWER(email_address)=?', array(strtolower($this->username)));
            if ($user === null)
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            else if (!$user->userAuth->validatePassword($this->password))
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            else {
                $this->_id = $user->user_id;
                $this->username = $user->email_address;
                $this->setState('lastLogin', date("m/d/y g:i A", strtotime($user->last_login)));
                $user->saveAttributes(array(
                    'last_login' => date("Y-m-d H:i:s", time()),
                ));
                $this->errorCode = self::ERROR_NONE;
            }


        } else {
            $domains = array('tigers', 'umc-users', 'umh', 'umhs-users', 'um-users'/*, 'umsl-users', 'mst-users', 'umkc-users'*/);

            $this->ldapConnect();
            $this->checkLDAPBind($domains);

            if (!$this->_bind)
                if ($this->findLDAPUser())
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                else
                    $this->errorCode = self::ERROR_PAWPRINT_INVALID;
            else {
                $this->getLDAPEntry();

                $user = User::model()->findByAttributes(array('sso' => $this->username));

                if ($user == null) {
                    $email_address = @strtolower($this->getLDAPVal("mail"));
                    $user = User::model()->findByAttributes(array('email_address' => $email_address));
                    if (is_null($user)) {
                        $user = new User();
                        $user->email_address;
                    }

                    $user->first_name = @ucfirst($this->getLDAPVal("givenName"));
                    $user->last_name = @ucfirst($this->getLDAPVal("sn"));
                    $user->sso = strtolower($this->username);
                    $user->save(false);
                    $user->userAuth->delete();
                }

                if (!is_null($user)) {
                    $this->_id = $user->user_id;
                    $this->errorCode = self::ERROR_NONE;
                }


                $groups = ldap_get_values($this->_connection, $this->_entry, "memberOf");

                foreach ($groups as $group) {
                    $newGroup = preg_replace("/^(CN=)([^,]*)(.*)/i", "$2", $group);
                    $memberOf[] = $newGroup;
                }

                $this->setState('memberOf', $memberOf);
                $this->setState('fullName', $user->first_name . ' ' . $user->last_name);
            }
        }

        return $this->errorCode == self::ERROR_NONE;
    }

    private
    function bindResource()
    {
        $this->_bind = ldap_bind($this->_connection, 'umc-users\musasitldap', 'B00kst0r3');
    }

    private
    function ldapConnect()
    {
        $options = Yii::app()->params['ldap'];

        $this->_connection = ldap_connect($options['host'], '3268');
        ldap_set_option($this->_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->_connection, LDAP_OPT_REFERRALS, 0);
    }

    private
    function findLDAPUser()
    {

        $this->bindResource();
        $dn = NULL;
        $result = ldap_search($this->_connection, $dn, 'samAccountName=' . $this->username);

        if (ldap_count_entries($this->_connection, $result) == 0) {
            $this->errorCode = self::ERROR_PAWPRINT_INVALID;
            return false;
        }

        return true;
    }

    private
    function getLDAPVal($value)
    {
        $values = ldap_get_values($this->_connection, $this->_entry, $value);

        return $values[0];
    }

    private
    function getLDAPEntry()
    {
        $this->bindResource();

        $result = ldap_search($this->_connection, $dn = NULL, 'samAccountName=' . $this->username);

        $this->_entry = ldap_first_entry($this->_connection, $result);
    }


    /**
     * @param array $domains : array of different domains to check
     */
    private
    function checkLDAPBind($domains)
    {
        foreach ($domains as $domain) {
            if (@ldap_bind($this->_connection, $domain . '\\' . $this->username, $this->password)) {
                $this->_bind = ldap_bind($this->_connection, $domain . '\\' . $this->username, $this->password);
                break;
            }
        }

        if ($this->_bind == NULL) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
    }

    public
    function getId()
    {
        return $this->_id;
    }
}