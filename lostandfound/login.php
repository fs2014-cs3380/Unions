<?php
DEFINE('BASEDN','dc=edu');
DEFINE('HOST', 'ldap.missouri.edu');
DEFINE('PORT', '3268');
session_start();

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
if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
	header("Location: view.php");
	break;
}
if(isset($_POST['auth_submit']) && !empty($_POST['username']) && $_POST['auth_submit'] == 'Login'){
	$connection = ldap_connect(HOST, PORT);
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$errors = array();
	
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
				echo "No results found";
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
				
				if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true && $_SESSION['group'] == "mu sas it staff"){
					// Redirect user to admin console
					header("Location: item_approval.php");
				}
				elseif(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
					// Redirect user to admin console
					header("Location: view.php");
				}
			}
		} else {
			$errors[] = "Wrong username/password combination";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
		$(document).ready(function(){
			var username = document.getElementById('username');
			username.focus();
		});
		
		function openDialog(){
			var username = document.getElementById('username');
			if(username.value == ''){
				$( "#dialog" ).dialog({
					modal: true,
					buttons: {
						'Student': function() {
							username.value = "TIGERS\\";
							$(this).dialog('close');
						},
						'Staff': function() {
							username.value = "UMC-USERS\\";
							$(this).dialog('close');
						}
					},
					close: function(){
						$(this).remove();
						$(this).css('display', 'none');
					}
				});
			}
		};	
	</script>
	<style>
	.pageTitle{
		color: #ffcc33;
		font-family: 'Roboto', sans-serif;
        font-size: 60px;
		float: left;
		padding-top: 20px;
		padding-left: 160px;
		font-weight: normal !important;
	}
	.ui-widget-content {
	font-family: 'Roboto', sans-serif;
		border: 1px solid #aaaaaa;
		background: black url(images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x !important;
		color: #ffcc33;
	}
	</style>
</head>
<body>

	<div class="top">
		
		<span class="topBanner"></span>
		<h1 class="pageTitle">Login Page</h1>
	</div><br>
	<div id="dialog" title="Question?">
		Are you a student or staff member?
	</div>
	<div id="input" >
		<form name="login" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="header">
				<h1 class="titles">Lost and Found</h1>
				<span class="info">Please login</span><hr>
			</div>
			<?php
				if(!empty($errors)){
			?>
			<div class="errors">
				<?php echo $errors[0]; ?>
			</div>
			<?php
				}
			?>
			<div class="credentials">
				<input type="text" name="username" id="username" placeholder="Domain\Username" class="box searchFieldText" title="Please provide your username" onfocus="openDialog()"/>
			</div>
			<div class="credentials">
				<input  type="password" name="pwd" placeholder="Password" class= "box searchFieldText" title="Please provide your password"/><br><br>
			</div>
			<div class="footer">
				<input type="submit" name="auth_submit" value="Login" class="buttons" />
			</div>
		</form>
	</div>
</body>
</html>