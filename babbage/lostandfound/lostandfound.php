<!--  Lost and Found Module for unions project -->
<?php
$mainDir = "/students/groups/cs3380f14grp18/public_html/";
require $mainDir . "/includes/header.php";
?>
<html>
<head>
<title>Lost and Found</title>
<script>                        //Function to send data to other php program for processing
function clickAction(form, id, action)
{
  document.forms[0].elements['id'].value = id;
  document.forms[0].elements['action'].value = action;
  document.forms[0].submit();
}
</script>
</head>
<body>
<form method="POST" action="/~cs3380f14grp18/lostandfound/update.php">

<?php
SESSION_START();        //Starts the session for the webpage
//if(!isset($_SESSION['user'])){  //If the session doesn't exist, then the attempt is redirected to the login page
//        header('LOCATION: /~cs3380f14grp18/index.php');
//}
//HTML headers and info is done using the html font tags.
?>
<input type="text" name="input_string" />
<input type="submit" name="search" value="Search" />  (Search by Name, Location, or Color)<br><br>
<input type="submit" name="new" value="Enter New Lost Item" /><br><br><br><hr />

<?php
include("../secure/database.php");                              //Creates a connection to the database
 $conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
	if($_SESSION['search']!=1){
 $result = pg_query($conn,"SELECT id, entryUser, name AS Item, item_type AS Type, location AS Location, status AS Status, foundBy AS Found_By, dateLost AS Date_Lost, color AS Color FROM lost") or die('Query failed: ' . pg_last_error());      //Checks for errors with the query
        echo "<table border = '1'>\n";          //Creates a table
        echo "\n\n";
	$num = 0;
        $col = pg_num_fields($result);          //Counts the number of columns for looping the print
	//if($col!=0){
                echo "\t\t<th>Actions</th>\n";
        //}
        for($head=0;$head<$col;$head++){
		 $header = pg_field_name($result,$head); //Gets the header field
		if($num ==0 || $num==1){
			//Skips the id tag
			$num++;
		}
		else{
                	echo "\t\t<th>$header</th>\n";          //Prints the header field
		}
        }
?>              <!--Creates new post for the passing of information-->
<form id="action_form" method="POST" action="/~cs3380f14grp18/lostandfound/update.php">
<input type="hidden" name="id" />
<input type="hidden" name="action" />
<?php
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {    //Loops to print all of the information in the query
                echo "\t<tr>\n";
		$count = 0;
$_SESSION['admin']=1;
		foreach ($line as $val) {
               		if($count ==0){
?>				<td><input type="button" value="Found?" onclick="clickAction('action_form', '<?php echo $val; ?>' , 'found')" />
<?php			if($_SESSION['admin']==1){ ?>
        	                <input type="button" value="Remove" onclick="clickAction('action_form', '<?php echo $val; ?>' , 'remove')" /></td> <?php } ?>
<?php                   	//$count=1;
			}
			else if($count ==1){
				//Removes the user info from printing
			}
			else if($count >1){
                        	echo "\t\t<td>$val</td>\n";       //Prints the value to the correct table cell
			}
			$count++;
                //echo "\t</tr>\n";
		}
		echo "\t</tr>\n";
        }
        echo "</table>\n";              //Closes the table
	}
	$_SESSION['search']=0;
//Runs if the update button is pressed
if(isset($_POST['search'])){
	$_SESSION['search']=1;
	$input = htmlspecialchars($_POST['input_string']);
	$result = pg_prepare($conn,$search,'Select name, item_type, location, status, foundBy, dateLost, color FROM lost WHERE (name ILIKE $1) || (color ILIKE $1)|| location ILIKE $1');
	$result = pg_query($conn, $search, array($input));
	echo "<table border = '1'>\n";          //Creates a table
        echo "\n\n";
        $col = pg_num_fields($result);          //Counts the number of columns for looping the print
	if($col!=0){
		echo "\t\t<th>Actions</th>\n";
	}
        for($head=0;$head<$col;$head++){
                $header = pg_field_name($result,$head); //Gets the header field
                echo "\t\t<th>$header</th>\n";          //Prints the header field
        }

?>              <!--Creates new post for the passing of information-->
<form id="action_form" method="POST" action="/~cs3380f14grp18/lostandfound/update.php">
<input type="hidden" name="id" />
<input type="hidden" name="action" />
<?php
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {    //Loops to print all of the information in the query
                echo "\t<tr>\n";
                $count = 0;
                foreach ($line as $val) {
                        if($count ==0){
?>                              <td><input type="button" value="Found" onclick="clickAction('action_form', '<?php echo $val; ?>' , 'found')" />
<?php                   if($_SESSION['admin']==1){ ?>
                                <input type="button" value="Remove" onclick="clickAction('action_form', '<?php echo $val; ?>' , 'remove')" /></td> <?php } ?>
                                </form>
<?php                           //$count=1;
                        }
                        else if($count >0){
                                echo "\t\t<td>$val</td>\n";       //Prints the value to the correct table cell
                        }
                        $count++;
                echo "\t</tr>\n";
                }
        }
        echo "</table>\n";              //Closes the table
}
//Runs if the new button is pressed
if(isset($_POST['new'])){
        header('LOCATION: /~cs3380f14grp18/lostandfound/new.php');    //Redirects to the update page
}
if(isset($_POST['return'])){
	header('LOCATION: /~cs3380f14grp18/index.php');
}
pg_close($conn);
?>
</form>
</body>
</html>
<?php
require $mainDir . "/includes/footer.php";
?>         
