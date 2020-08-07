<?php
include 'conn.php'; // MySQL
if (isset($_POST["delete_event_id"])) {
    $query  = "DELETE FROM events WHERE event_id = '" . $_POST["delete_event_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
