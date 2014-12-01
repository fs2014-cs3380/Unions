<?php
require "../includes/header.php";
?>

    <form method="POST" action="reservearoom.php">
        Rooms by Building: <br>
        Show Rooms in Memorial Union
        <input type="submit" name="MU" value="Memorial Union"/>
        Show Rooms in Student Center
        <input type="submit" name="SC" value="MU Student Center"/> <br>

        <hr>
        Rooms by Size:<br>
        Show Smaller Rooms (50 or Less)
        <input type="submit" name="SMALL" value="Small Spaces"/>
        Show Large Rooms (Larger Than 50!)
        <input type="submit" name="LARGE" value="Large Spaces"/><br><br>
        <hr>
        Know your Specific Room Id?<br>
        <select name="ROOMIDNUM">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="32">37</option>
            <option value="33">38</option>
            <option value="34">39</option>
            <option value="40">40</option>
        </select>
        <input type="submit" name="ROOMID" value="Room ID"/><br><br>

        Show All Rooms
        <input type="submit" name="ALL" value="Show All Rooms"/>
        <br>
        <hr>
        <br>
    </form>

<?php
//require_once("../secure/database.php");
$conn = pg_connect(CONNSTRING);//pg_connect(HOST . " " . DBNAME . " " . USERNAME . " " . PASSWORD);
pg_query("SET search_path=unions;");
$option = 'ALL';

if (isset($_POST['SC'])) {
    $option = 'SC';
}

if (isset($_POST['MU'])) {
    $option = 'MU';
}

if (isset($_POST['SMALL'])) {
    $option = 'SMALL';
}

if (isset($_POST['LARGE'])) {
    $option = 'LARGE';
}

if (isset($_POST['ROOMID'])) {
    $option = 'ROOMID';
}

$str = '';

if ($option == 'MU') {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (event_space_id >= 1) AND (event_space_id <=24) ORDER BY name ASC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array()) or die ("execute of description query");
} else if ($option == 'SC') {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (event_space_id >= 25) ORDER BY name ASC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array()) or die ("execute of description query");
} else if ($option == 'SMALL') {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (capacity <= 50) ORDER BY capacity DESC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array()) or die ("execute of description query");
} else if ($option == 'LARGE') {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (capacity > 50) ORDER BY capacity DESC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array()) or die ("execute of description query");
} else if ($option == 'ROOMID') {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space WHERE (event_space_id = $1) ORDER BY capacity DESC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array($_POST['ROOMIDNUM'])) or die ("execute of description query");
} else {
    pg_prepare($conn, $str, 'SELECT event_space_id AS EventSpaceID, name AS Name, floor_id AS Floor, capacity AS Capacity FROM event_space ORDER BY name ASC') or die ('prep of found query' . pg_last_error());
    $result = pg_execute($conn, $str, array()) or die ("execute of description query");
}

$header_num = pg_num_fields($result);

$row_num = pg_num_rows($result);

if ($row_num > 1)
    echo "There are $row_num Spaces shown to Reserve!";
else
    echo "That Space is Shown Below!";
?>

    <br><br>
<?php
//PRINT OUT TABLE WITH HEADER
echo "<table border = '1'>\n";
echo "<th>Action</th>";
//FOR LOOP TO CREATE HEADER
for ($i = 0; $i < $header_num; $i++) {
    $header = pg_field_name($result, $i);
    echo "<th>$header</th>";
}

//PRINT OUT REST OF TABLE
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";

    $count = 0;
    foreach ($line as $col_value) {
        if ($count == 0) {
            ?>
            <td>
                <form method="POST" action="reserve.php">
                    <input type="hidden" name="id" value="<?php echo $col_value; ?>"/>
                    <input type="hidden" name="action"/>
                    <input type="submit" value="Reserve"
                           onclick="location.href ="reserve.php';"/>
                </form>
            </td>
        <?php
        }
        echo "\t\t<td>$col_value</td>\n";
        $count = 1;
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

?>


<?php
require "../includes/footer.php";
?>