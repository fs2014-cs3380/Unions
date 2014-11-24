<!DOCTYPE html>
<html>
<head>
<title>Update</title>
</head>
<body>
<form method="POST" action="/~cs3380f14grp18/reservearoom/update.php">

        <input type="hidden" name="id" value=<?php echo $_POST['id']; ?> />
        <input type="hidden" name="action" value=<?php echo $_POST['action']; ?> />
        <table border="1">
<?php

 include("../secure/database.php");                              //Creates a connection to the database
 $conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);


if($_POST['action']=="reserve"){          //Looks to see if the person wants to edit an entry
	pg_prepare($conn,$foundUpdate, 'SELECT name, item_type, location, color FROM lost WHERE id = $1') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $descUpdate, array($_POST['id'])) or die ("execute of description query");         //Gets the description for the user
while($res = pg_fetch_array($result,null,PGSQL_ASSOC)){
	echo "<tr>";
        foreach ($res as $val){
               	echo "<td>".$val."</td>";   //Sets the description to a local variable
        }
	echo "</tr>";
}
echo "Is this the item that you found?";
//The following form creates the layout for the text box and buttons
?>
        <form method="POST" action="/~cs3380f14grp18/reservearoom/update.php">
        <input type="submit" value="Yes I found it!" name="yes" />
        <input type="submit" name="no" value="No I didn't find it." />
        </form>
<?php

}
//Runs if the submit button is pressed
if(isset($_POST['yes'])){
	pg_prepare($conn,$descUpdate, 'UPDATE lost SET foundBy = $1, status=$2 WHERE id = $3') or die ("prep of update" . pg_last_error());
	$result = pg_execute($conn, $descUpdate, array($_SESSION['user'],"Foun",$_POST['id'])) or die ("execute of update" . pg_last_error()); //Updates the user description
	header('LOCATION: /~cs3380f14grp18/lostandfound/lostandfound.php');      //Redirects to home after the update if it is successful
}
if(isset($_POST['yesRemove'])){
        pg_prepare($conn,$descUpdate, 'DELETE FROM lost WHERE id = $1') or die ("prep of update" . pg_last_error());
        $result = pg_execute($conn, $descUpdate, array($_POST['id'])) or die ("execute of update" . pg_last_error()); //Updates the user description
        header('LOCATION: /~cs3380f14grp18/lostandfound/lostandfound.php');      //Redirects to home after the update if it is successful
}

//Runs if the return button is pressed. Redirects to the home page
if(isset($_POST['no'])){
        header('LOCATION: /~cs3380f14grp18/lostandfound/lostandfound.php');
}
pg_close($conn);
?>
</body>
</html>


