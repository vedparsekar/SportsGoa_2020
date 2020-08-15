<?php 
    include("header.php");
    $query4="select * from fixtures where match_id='$match_id'";
$result4 = mysql_query($query4,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
if (mysql_num_rows($result4) > 0) { 
while($row = mysql_fetch_array($result4))
 { 
 	$team1_name=$row['team1'];
    $team2_name=$row['team2'];
    $event_id=$row['event_id'];
    $match_id=$row['match_id'];
    $place=$row['place'];

}
}
?>
<html>

</html>