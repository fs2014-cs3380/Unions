<?php require "../includes/header.php"; ?>

<form method="POST" action="update.php">

    <input type="hidden" name="id" value=<?php echo $_POST['id']; ?> />
    <table border="1">


    Enter day of Reservation: <input type="date" name="day" value="<?php echo '2015-01-01'; ?>"/><br><br>

    Enter Start Time: <input type="time" name="startTime" value="<?php echo '12:00'; ?>"/>

    Enter End Time: <input type="time" name="endTime" value="<?php echo '13:00'; ?>"/> <br> <br>

    <input type="submit" name="Reserve" value="Reserve"/> <br><br>

<?php
//require_once("../secure/database.php");
$conn = pg_connect(CONNSTRING);//pg_connect(HOST . " " . DBNAME . " " . USERNAME . " " . PASSWORD);
pg_query("SET search_path=unions;");
$str = '';
pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (event_space_id = $1)') or die ('prep of found query' . pg_last_error());
$result = pg_execute($conn, $str, array($_POST['id'])) or die ("execute of description query");         //Gets the description for the user

$header_num = pg_num_fields($result);

//PRINT OUT TABLE WITH HEADER
echo '<table border="1">';
//FOR LOOP TO CREATE HEADER
for ($i = 0; $i < $header_num; $i++) {
    $header = pg_field_name($result, $i);
    echo "<th>$header</th>";
}

while ($res = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "<tr>";
    foreach ($res as $val) {
        echo "<td>" . $val . "</td>";
    }
    echo "</tr>";
}

require "../includes/footer.php";
?>