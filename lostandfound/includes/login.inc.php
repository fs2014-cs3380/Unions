<?php
if(isset($_POST['checkAjax'])){
	require_once('../config.php');
	session_start('MU SAS Lost & Found');
	if(isset($_POST['auth_submit']) && !empty($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['pwd'];
		$return = array();

		$connection = ldap_connect(LDAP_HOST, PORT);

		if($connection !== FALSE){
			ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
			
			if(bindToLDAP($username, $password)){
				$attr = array(
							'memberOf',
							'sn',
							'givenName',
						);
				$un_parts = explode('\\', $username);
				$pawprint = $un_parts[1];
				
				$result = ldap_search($connection, BASEDN, 'sAMAccountName='.$pawprint, $attr);
				if(ldap_count_entries($connection, $result) == 0){
					$return['error'] = "No results found";
				} else {
					$user = ldap_first_entry($connection, $result);
					$user_groups = getLDAPVal('memberof', $user, true);
					$is_member = false;
					foreach ($user_groups as $group){
						$group_name = preg_replace("/^(CN=)([^,]*)(.*)/i", "$2", $group);
						if(strtolower($group_name) == 'mu sas it staff' || strtolower($group_name) == 'mu sas lost and found' ){
							$_SESSION['auth_token'] = true;
							$_SESSION['first_name'] = getLDAPVal('givenname', $user);
							$_SESSION['last_name'] = getLDAPVal('sn', $user);
							$_SESSION['pawprint'] = $pawprint;
							$_SESSION['group'] = strtolower($group_name);
						}
					}
					$return['error'] = '';
				}
			} else {
				$return['error'] = "Wrong username/password combination";
			}
		}
	} else {
		$return['error'] = "Please enter your pawprint";
	}
	echo json_encode($return);
}
else{
?>
	<div id="dialog" title="Question?">
		Are you a student or staff member?
	</div>
	<div id="input" >
		<form name="login" id="login" class="login-form" action="" method="post">
		<input type="hidden" name="content" />
			<div class="header">
				<h1 class="titles">Lost and Found</h1>
				<span class="info">Please login</span><hr>
			</div>
			<div class="errors"></div>
			<div class="credentials">
				<input type="text" name="username" id="username" placeholder="Domain\Username" class="box searchFieldText" title="Please provide your username" onfocus="openDialog()" onblur="openDialog()" />
			</div>
			<div class="credentials">
				<input  type="password" name="pwd" id="pwd" placeholder="Password" class= "box searchFieldText" title="Please provide your password"/><br><br>
			</div>
			<div class="footer">
				<input type="button" name="login" class="buttons" value="Login" onclick="loginRedirect();">
			</div>
		</form>
	</div>
<?php
}

function bindToLDAP($username, $password){
	global $connection;

	$bind = @ldap_bind($connection, $username, $password);
	
	return $bind;
}

function getLDAPVal($value, $entry, $return_array=false){
	global $connection;

    $values = ldap_get_values($connection, $entry, $value);

    return $return_array ? $values : $values[0];
}
?>