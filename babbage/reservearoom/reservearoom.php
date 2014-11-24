<!DOCTYPE html>
<html>
<head>
	<title>Reserve A Room </title>
</head>
<body>
<form method="POST" action="/~cs3380f14grp18/reservearoom/update.php">
<input type="text" name="input_string" />
<input type="submit" name="search" value="Search" />  (Search by Room Name, Capactiy)<br><br>
</form>

<?php
include("../secure/database.php");                            
 $conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
	
	$query = "SELECT room_id AS ID, room_name AS Room, capactiy AS Capacity, reserved AS Status FROM rooms";
 
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
  
	$header_num = pg_num_fields($result);


	//PRINT OUT TABLE WITH HEADER
	echo $col_value;
	echo "<table border = '1'>\n";
	echo "<th>Action</th>";
	//FOR LOOP TO CREATE HEADER
	for($i=0; $i<$header_num; $i++)
	{
		$header = pg_field_name($result, $i);
		echo "<th>$header</th>";
	}

	//PRINT OUT REST OF TABLE
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
		echo "\t<tr>\n";
		?>
		<td>
		<form method="POST" action="/~cs3380f14grp18/reservearoom/update.php">
		<input type="button" value="Reserve" onclick="clickAction('action_form', '<?php echo $val; ?>' , 'reserve')" />
		</form>
		</td>
		<?php
		foreach ($line as $col_value){
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	
?>
	
</body>
</html>