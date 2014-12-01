<!DOCTYPE html>
<html>
<head>
<title>Update</title>
</head>
<body>

<?php
$mainDir = "/students/groups/cs3380f14grp18/public_html/";
require $mainDir . "/includes/header.php";
?>

<form method="POST" action="/~cs3380f14grp18/reservearoom/update.php">
        <input type="hidden" name="id" value=<?php echo $_POST['id']; ?> />
        <table border="1">
<?	
	require_once("../secure/database.php");                      
 	$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
	pg_query("SET search_path=unions;");
	$str = '';
	pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (event_space_id = $1)') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $str, array($_POST['id'])) or die ("execute of description query");         //Gets the description for the user
		
	$header_num = pg_num_fields($result);
	
	
	echo "Your reservation is from " . $_POST['startTime'] . " to " . $_POST['endTime'] . " on " . $_POST['day'];?>
</form>
	<br><br>
	<?php echo "Thank you for Reserving this Event Space!" ?>
	<form method="POST" action="/~cs3380f14grp18/reservearoom/reservearoom.php">
	<input type="submit" value="Back to Reserve a Space" onclick= "location.href ='http://babbage.cs.missouri.edu/~cs3380f14grp18/reservearoom/reservearoom.php';" />
	</form>
	<hr>
	<?php

	//PRINT OUT TABLE WITH HEADER
	echo "<table border = '1'>\n";
	//FOR LOOP TO CREATE HEADER
	for($i=0; $i<$header_num; $i++)
	{
		$header = pg_field_name($result, $i);
		echo "<th>$header</th>";
	}		
			
			while($res = pg_fetch_array($result,null,PGSQL_ASSOC)){
				echo "<tr>";
					foreach ($res as $val){
						echo "<td>".$val."</td>";   
        }
	echo "</tr>";
	}

		
		?>
		
<?php
require $mainDir . "/includes/footer.php";
?>
		
</body>
</html>


