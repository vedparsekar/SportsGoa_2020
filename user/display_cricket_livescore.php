<?php
	$event_category=12;//$_GET['cat'];
	$event_type=143;//$_GET['type'];
	//require("../conn.inc.php"); 
	include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script> 
$(document).ready(function(){
setInterval(function(){
      $("#here").load(window.location.href + " #here" );
}, 3000);
});
</script>


<?php
	echo"<div id='here'><div class='tour-cat'> <b>" .$event_category. "</b> </div>";
	$query = "SELECT * FROM `livecricket` WHERE `reg_id`='".$event_category."' and `event_id`='".$event_type."'"; 

	$result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
	if (mysql_num_rows($result) > 0) { 
	while($row = mysql_fetch_array($result)) { 
			echo "<div>";
			echo "<div>";
			$event_id=$row['event_id'];
			?>
		<div> <a href="#">
		<div class="tournament-img">
			<div align="center"><img src="../content/world/img/news/latest-b.jpg<?php //echo $row['pic']; ?>" class="tour-img" /></div>

		</div>

		<?php
		echo "
		<div class='tour-div'>
		<div class='tour-nm'> <b>" .$row['runs']."/".$row['wickets']. "  </b></div>.
		<div class='tour-info'>Overs:".$row['overs']. " at " .$row['toss']. "</div>" ;
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