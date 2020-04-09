<?php
	$event_category=$_GET['cat'];
	$event_type=$_GET['type'];
	//require("../conn.inc.php"); 
	include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	echo"<div class='tour-cat'> <b>" .$event_category. "</b> </div>";
	$query = "SELECT * FROM `events` WHERE `event_category`='".$event_category."' and `event_type`='".$event_type."'"; 

	$result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
	if (mysql_num_rows($result) > 0) { 
	while($row = mysql_fetch_array($result)) { 
			echo "<div>";
			echo "<div>";
			$event_id=$row['event_id'];
			?>
		<div> <a href="event_home.php?event_id=<?php echo $event_id; ?>">
		<div class="tournament-img">
			<div align="center"><img src="../content/world/img/news/latest-b.jpg<?php //echo $row['pic']; ?>" class="tour-img" /></div>

		</div>

		<?php
		echo "
		<div class='tour-div'>
		<div class='tour-nm'> <b>" .$row['event_name']. "</b> </div>.
		<div class='tour-info'>This ".$row['event_category']. " tournament will strt from ".$row['t_date']. " at " .$row['place']. " from " .$row['t_time']." onwards </div>" ;
		echo "</a></div>";
		echo "</div>";
		echo "</div>
		<div>
		<br></div></div>";
		}
	}
	else
	{
		header("location:../homepage.php");
	}

	include("../footer.php");
?>

</body>
</html>