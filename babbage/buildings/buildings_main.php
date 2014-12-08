<!-- Building info and what's inside module -->

<?php
	$mainDir = "..";
	//pull the header in
	require $mainDir . "/includes/header.php";
?>

<html>
<head> 
	<title>Building Info</title>
</head>
<body>
	<h1>All Tigers Welcome!<span style="font-size: 10pt;"></span></h1>
	<p>The Missouri Student Unions proudly announce new family-friendly features that make our facilities a place to call home for ALL Tigers! High chairs and booster seats are available for our littlest Tigers in the MU Student Center and Memorial Student Union dining facilities, plus parents and caregivers will find changing stations in all unions restrooms. The MU Student Center is home to a Family Room in the Women’s Center, located on the lower level, that is equipped to be used as a lactation station and/or a play and study area with your child. A gender neutral restroom can be found on the lower level, down the hall from the RSVP Center. Don’t forget, The Mizzou Store offers a special children’s reading area with books and space designed just for kids! We invite you to take advantage of our family-friendly amenities everywhere you see this symbol because our commitment to the Mizzou family includes everyone.</p>
	
	<?php
	//require_once("../secure/database.php");
 	$conn = pg_connect(CONNSTRING);
	pg_query("SET search_path=unions;");
	$str = '';
	$result = pg_prepare($conn, $str, 'SELECT name FROM feature WHERE (building_id = 1)') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $str, array()) or die ("execute of description query");         //Gets the description for the user
		
	$header_num = pg_num_fields($result);


	//PRINT OUT TABLE WITH HEADER
	echo "<table border = '1'>\n";
	//FOR LOOP TO CREATE HEADER
	for($i=0; $i<$header_num; $i++)
	{
		echo "<th>MU Student Center</th>";
	}				
		while($res = pg_fetch_array($result,null,PGSQL_ASSOC))
		{
				echo "<tr>";
						foreach ($res as $val){
						echo "<td>";
  						echo "<a href=$val>";
    					echo "<div>$val</div>";
 						echo "</a>";
						echo "</td>";    
        }
		echo "</tr>";
	}
	
	$result = pg_prepare($conn, $str, 'SELECT name FROM feature WHERE (building_id = 2)') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $str, array()) or die ("execute of description query");         //Gets the description for the user
		
	$header_num = pg_num_fields($result);


	//PRINT OUT TABLE WITH HEADER
	echo "<table border = '1'>\n";
	//FOR LOOP TO CREATE HEADER
	for($i=0; $i<$header_num; $i++)
	{
		echo "<th>Memorial Union</th>";
	}				
		while($res = pg_fetch_array($result,null,PGSQL_ASSOC))
		{
				echo "<tr>";
					foreach ($res as $val){
						echo "<td>";
  						echo "<a href=$val>";
    					echo "<div>$val</div>";
 						echo "</a>";
						echo "</td>";   
        }
		echo "</tr>";
	}		
	?>
</body>
</html>

<?php
	require $mainDir . "/includes/footer.php";
?> 
	
