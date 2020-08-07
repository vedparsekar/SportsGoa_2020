<?php
include 'conn.php'; // MySQL
if (isset($_POST["subuser_id"])) {
    $query  = "SELECT * FROM sub_users WHERE subuser_id = '" . $_POST["subuser_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else if (isset($_POST["event_id"])) {
    $query  = "SELECT * FROM events WHERE event_id = '" . $_POST["event_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else {
	echo "";
}
?>
