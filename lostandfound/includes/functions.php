<?php
function printColumns($result)
{
	if($result == false){
		echo "<tr><td>There were no records found.</td></tr>";
		return false;
	}
	while($array = mysqli_fetch_assoc($result)) 
	{
		foreach($array as $attribute)
		{
			if(empty($attribute))
				echo "<td>N/A</td>\n";
			else
				echo "<td >$attribute</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</form>\n";
	echo "</div>\n";
	echo "</div>\n";
}

function printColumnHeader($result, $dbconn)
{
	echo "<div class=\"table\" >\n";
	echo "<table class=\"table table-hover\">\n";
	echo "<tr>\n";
	for($i = 0; $i < mysqli_field_count($dbconn); $i++)
	{
		$field_info = mysqli_fetch_field($result);
        if($field_info->db == 'unions_lost_and_found'){
		    $field_info = ucwords(str_replace('_', ' ', $field_info->name));
		   echo "<td class=\"white\">$field_info</td>\n";
        }
	}
	echo "</tr>\n";
}
?>