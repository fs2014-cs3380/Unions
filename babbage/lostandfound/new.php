<!DOCTYPE HTML>
<?php
$mainDir = "/students/groups/cs3380f14grp18/public_html/";
require $mainDir . "/includes/header.php";
?>
<html>
<head>
<title>Registration</title>
</head>

<body>
<form method="POST" action="/~cs3380f14grp18/lostandfound/new.php">
Item name (iPhone, sweater, bookbag,etc.): <input type="text" name="nameInput" /><br>      <!--Text boxes for user input-->
Type: <input type="text" name="typeInput" /><br>
Location Lost (Strickland 222A, EBW, Geo Sciences, etc.) : <input type="text" name="locationInput" /><br>
Date Lost (12/01/99): <input type="text" name="dateInput" /><br>
Color (Blue, brown with purple flowers, etc.): <input type="text" name="colorInput" /><br>

<input type="submit" name="submit" value="Submit" />
<input type="submit" name="back" value="Return to search page" />
</form>

<?php
include("../secure/database.php");                              //Creates a connection to the database
$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
if($conn) {
//echo "<p>Successfully connected to DB</p>";
} else {
echo "<p>Failed to connect to DB</p>";          //Echo's if the connection fails
}


 SESSION_START();       //Starts the cookie session for php

if(isset($_POST['submit'])){    //Checks for the submit button to be pressed
        $name = htmlspecialchars($_POST['nameInput']);      //Removes html characters from input
        $type = htmlspecialchars($_POST['typeInput']);
        $location = htmlspecialchars($_POST['locationInput']);
	$date = htmlspecialchars($_POST['dateInput']);
	$color = htmlspecialchars($_POST['colorInput']);
$_SESSION['user']='bar5z6';
        //$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
        pg_prepare($conn, $userCheck, 'INSERT INTO lost (entryUser,name,item_type,location,dateLost,color) VALUES ($1,$2,$3,$4,$5,$6)') or die ('in first prep. '.pg_last_error());     //Prepares the select statment for the username check
                $result = pg_execute($conn, $userCheck, array($_SESSION['user'],$name,$type,$location,$date,$color)) or die ('in insert statement.'.pg_last_error());      //Runs the username check
        header('Location: /~cs3380f14grp18/lostandfound/lostandfound.php');
}
if(isset($_POST['back'])){      //Returns to the login page if button is pressed
        header('LOCATION: /~cs3380f14grp18/lostandfound/lostandfound.php');
}

pg_close($conn);
?>
</body>
</html>
<?php
require $mainDir . "/includes/footer.php";
?>
