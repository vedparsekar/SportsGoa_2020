<?php
	$event_category=$_GET['cat'];
	$event_type=$_GET['type'];
	$user_name=$_GET['id'];
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

	$query = "SELECT * FROM `events` WHERE `event_category`='".$event_category."' and `event_type`='".$event_type."'"; 

	$result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
	if (mysql_num_rows($result) > 0) { 
	while($row = mysql_fetch_array($result)) { 
			echo "<div class='container'>";
			echo "<div>";
			$event_id=$row['event_id'];
			?>
		<div class="a"> <a href="event_home.php?event_id=<?php echo $event_id; ?>&id=<?php echo $user_name;?>">
		<div style="width: 1000px;margin-left: 50px;">
			<div align="center"><img src="user_images/<?php echo $row['pic']; ?>" class="img-rounded" width="1000px" height="300px" /></div>

		</div>

		<?php
		echo "
		<div>
		<h1  style='margin-left:50px;margin-top:-5px;'> <b>" .$row['event_name']. "</b> </h1>.
		<h4 style='margin-left:50px;margin-top:-20px;'>This ".$row['event_category']. " tournament will strt from ".$row['t_date']. " at " .$row['place']. " from " .$row['t_time']." onwards </h4>" ;
		echo "</a></div>";
		echo "</div>";
		echo "</div>
		<div>
		<br> <br> <br> <br></div></div>";
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