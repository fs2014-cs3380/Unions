<?php
function printColumns($result)
{
	
	if($result == false){
		echo "<tr><td>There were no records found.</td></tr>";
		return false;
	}
	while($array = mysqli_fetch_assoc($result)) 
	{

		
		echo "<tr>\n";
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


	echo "<div>\n";
	echo "<table class=\"resultTable\">\n";
	echo "<tr>\n";
	
	for($i = 0; $i < mysqli_field_count($dbconn); $i++)
	{
		$field_info = mysqli_fetch_field($result);
        if($field_info->db == 'unions_lost_and_found'){
		    $field_info = ucwords(str_replace('_', ' ', $field_info->name));
		    echo "<th>$field_info</th>\n";
			
        }
	}
	echo "</tr>\n";
}

?>

<!DOCTYPE html>
<html>
	<script>
	function editDatabase(form, pk, action){
		document.forms[form].elements['pk'].value = pk;
		document.forms[form].elements['action'].value = action;
		document.forms[form].submit();
	}
	function showClaimedItems(form, action){
		

			document.forms[form].elements['action'].value = action;
			document.forms[form].submit();

	}
	</script>
	<style>

	td, th, table {
		border: 3px solid black;
		color: black;
		padding: 10px;
	}

	html{
		height: 100%;
		background-color: black;	
	}
	.form {
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande";
	width: 90%;
	height: 80%;
	margin: 0 auto;
	position: relative;
	background: black;
	color: white;
	border: 1px solid;
	border-radius: 5px;
	box-shadow: 0 1px 3px rgba(0,0,0,1.0);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,1.0);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,1.0);

	}
	.resultTable {
		background: #ffcc33;
		border-collapse: collapse;
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande";
		width: 80%;
		height: 80%;
		margin: 0 auto;
		position: relative;
		border: 1px solid;
		border-radius: 5px;
		box-shadow: 0 1px 3px rgba(0,0,0,1.0);
		-moz-box-shadow: 0 1px 3px rgba(0,0,0,1.0);
		-webkit-box-shadow: 0 1px 3px rgba(0,0,0,1.0);

	}
	#input {
		color: #fff;
		text-shadow: 0px 1px 0 rgba(0,0,0,0.25);
		margin: 100px auto;
	}
	.topBanner {
		background: transparent url('../unions.jpg') no-repeat scroll top right;
		float: left;
		width: 400px;
		height: 100px;
	}
	.top {
		width: 960px;
		height: 100px;
		background-color: black;
		float: left;
	}
	h1 {
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande";
		font-weight: 300;
		font-size: 28px;
		line-height:34px;
		text-align: center;
		color: #ffcc33;
		text-shadow: 1px 1px 0 rgba(256,256,256,.8);
		margin-bottom: 10px;
	}

	span.header{
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande";
		font-size: 13px;
		padding-left: 10px;
		color: black;
		text-shadow: 1px 1px 0 rgba(256,256,256,1.0);
		}

	

	</style>

<body>
	<div class="top">
		<span class="topBanner"></span>
		

	</div><br>
	<div id="input" >
	<form name="view" class="form" action="" method="post">
			<div>
				<h1>Lost and Found</h1>
			</div>

	</form>		
	</div>


	
	
	


</body>

</html>
