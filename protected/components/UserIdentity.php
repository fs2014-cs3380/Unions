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

    public function authenticate()
    {
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
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
}