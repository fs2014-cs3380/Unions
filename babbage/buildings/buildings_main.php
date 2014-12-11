<!-- Building info and what's inside module -->

<?php
	$mainDir = "/students/groups/cs3380f14grp18/public_html/";
	//pull the header in
	require $mainDir . "/includes/header.php";
?>

<html>
<head> 
	<title>Building Info</title>
	<style type="text/css">
		#leftnav,#rightnav {
    	float:left;
    	margin: 20px;
 		}
	</style>
</head>
<body>
	<h1>All Tigers Welcome!<span style="font-size: 10pt;"></span></h1>
	<p>The Missouri Student Unions proudly announce new family-friendly features that make our facilities a place to call home for ALL Tigers! High chairs and booster seats are available for our littlest Tigers in the MU Student Center and Memorial Student Union dining facilities, plus parents and caregivers will find changing stations in all unions restrooms. The MU Student Center is home to a Family Room in the Women’s Center, located on the lower level, that is equipped to be used as a lactation station and/or a play and study area with your child. A gender neutral restroom can be found on the lower level, down the hall from the RSVP Center. Don’t forget, The Mizzou Store offers a special children’s reading area with books and space designed just for kids! We invite you to take advantage of our family-friendly amenities everywhere you see this symbol because our commitment to the Mizzou family includes everyone.</p>
	
	<?	
	require_once("../secure/database.php");                      
 	$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
	pg_query("SET search_path=unions;");
	$str = '';
	
	//query for the student center
	$result = pg_prepare($conn, $str, 'SELECT name, url FROM feature WHERE (building_id = 1)') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $str, array()) or die ("execute of description query");         //Gets the description for the user
		
		//print out the header of the building
		echo "<h2> Memorial Union </h2>\n";
		echo "<ul id=leftnav>\n";	
		$dump =0;
		while($res = pg_fetch_array($result,null,PGSQL_ASSOC))
		{
        	foreach ($res as $val)
            {
            	//logic to not print the duplicate names
            	if($dump == 0)
            	{
                	echo "<li>";
  	                echo "<a href=$res[url]>$res[name]";
                    echo "</a>";
                	echo "</li>\n";
                 	$dump=1;
                }
                else{
                    $dump=0;
            }
    	}
	echo "</ul>\n";
	
	//query for memorial union
	$result = pg_prepare($conn, $str, 'SELECT name, url FROM feature WHERE (building_id = 2)') or die ('prep of found query' . pg_last_error());
	$result = pg_execute($conn, $str, array()) or die ("execute of description query");         //Gets the description for the user
		
		echo "<h2> MU Student Center</h2>\n";
		echo "<ul id=rightnav>\n";
		$dump=0;
 		while($res = pg_fetch_array($result,null,PGSQL_ASSOC))
        {
        	foreach ($res as $val)
            {
            	//logic to not print the duplicate names
            	if($dump == 0)
            	{
                	echo "<li>";
  	                echo "<a href=$res[url]>$res[name]";
                    echo "</a>";
                	echo "</li>\n";
                 	$dump=1;
                }
                else{
                    $dump=0;
            }
    	}
	echo "</ul>\n";	

	?>
</body>
</html>

<?php
	require $mainDir . "/includes/footer.php";
?> 
	
