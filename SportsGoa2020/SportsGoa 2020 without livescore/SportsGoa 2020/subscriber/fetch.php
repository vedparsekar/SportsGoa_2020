<?php
include 'conn.php'; // MySQL
if (isset($_POST["edit_match_id"])) {
    $query  = "SELECT * FROM fixtures WHERE match_id = '" . $_POST["edit_match_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else if (isset($_POST["fetch_match_livescricket"])) {
    $query  = "select * from livecricket where match_id='" . $_POST["fetch_match_livescricket"] . "' and status='1'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else if (isset($_POST["subuser_id"])) {
    $query  = "SELECT * FROM sub_users WHERE subuser_id = '" . $_POST["subuser_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else if (isset($_POST["event_id"])) {
    $query  = "SELECT * FROM events WHERE event_id = '" . $_POST["event_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else if(isset($_POST["edit_volleyball_id"]))
{    
    $query = "Select fixtures.match_id, fixtures.event_id, fixtures.team1, fixtures.team2, results.team1_score, results.team2_score, results.description, results.set1,results.set2, results.set3, results.set4, results.set5, results.result_id from fixtures, results where results.match_id=fixtures.match_id and results.match_id='" . $_POST["edit_volleyball_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);

}else if(isset($_POST["edit_football_id"]))
{    
    $query = "Select fixtures.match_id, fixtures.event_id, fixtures.team1, fixtures.team2, results.team1_score, results.team2_score, results.description, results.result_id from fixtures, results where results.match_id=fixtures.match_id and results.match_id='" . $_POST["edit_football_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);

}else if (isset($_POST["edit_news_id"])) {
    $query  = "SELECT * FROM news_articles WHERE news_id = '" . $_POST["edit_news_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}else {
	echo "";
}
?>
