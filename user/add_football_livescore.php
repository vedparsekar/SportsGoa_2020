<?php
	include("header.php");
	$match_id=73;//$_GET['id'];
	$query4="select * from fixtures where match_id='$match_id'";
	$result4 = mysql_query($query4,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
if (mysql_num_rows($result4) > 0) { 
while($row = mysql_fetch_array($result4))
 { 
 	$event_id=$row['event_id'];
    $team1_name=$row['team1'];
    $team2_name=$row['team2'];
    $event_id=$row['event_id'];
    $match_id=$row['match_id'];
    $place=$row['place'];

}
}
	$query="select * from livescore where match_id='$match_id'";
	$result = mysql_query($query) or die ("Error in query: ".$query. " ".mysql_error());

while($row = mysql_fetch_array($result))
 { 

    $team1=$row['TEAM1'];
    $team2=$row['TEAM2'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="files/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="files/css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="files/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="files/js/jquery-1.11.1.min.js"></script>
<script src="files/js/bootstrap.js"></script>
<script src="files/js/SmoothScroll.min.js"></script>
<script src="files/js/jarallax.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="css/style.css">    </style>
	<title>LIVE SCORE</title>
	<style type="text/css">

		.score{
			float:center;
			margin-left:10%;
			margin-right:10%;
		}
		.end{
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			padding:5%;
		}
		.scr {
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-gap: 1em;
		}
		.s1{
			float:left;
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			grid-gap: 1em;
		}
		
		.match{
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			padding:1%;
		}
		
		.s2{
			float:right;
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			grid-gap: 1em;
		}

		.screen1
		{
			height:150px;
			width: 150px;
			float:left;
			text-align: center;
			font-size:70px;
			border-radius: 20px;

		}
		.screen2
		{
			height:150px;
			width: 150px;
			float:right;
			text-align: center;
			font-size:70px;
			border-radius: 20px;
		}
		#onebutton
		{
			height: 50px;
			width:  50px;	
		}
		#minusbutton
		{
			height: 50px;
			width:  50px;
		}
		.twobutton
		{
			height: 50px;
			width:  50px;
		}
		.minusbutton2
		{
			height: 50px;
			width:  50px;
		}
	</style>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function pass()
	{
	    var value = parseInt(document.getElementById('team1').value);
 	    value = isNaN(value) ? 0 : value;
	    value++;
 	   document.getElementById('team1').value = value;
	}

		function rass(value)
	{
		if(document.getElementById("team1").value>=1)
		{
		document.getElementById("team1").value-=value;
		}
	}

		function ps()
	{
	    var value = parseInt(document.getElementById('team2').value);
 	    value = isNaN(value) ? 0 : value;
	    value++;
 	   document.getElementById('team2').value = value;
	}

		function ss(val)
	{
		if(document.getElementById("team2").value>=1)
		{
		document.getElementById("team2").value-=val;
		}
	}

	</script>
</head>
<body>
   
<div class="score">
	<form method="GET">
		<h3 class="match">FOOTBALL</h3>
		<input type="hidden" name="match_id" id="team123" value="<?php echo $match_id; ?>" ></input><br/>
		<div class="scr">
		<div class="s1">
			<div>
				<input type="text" name="" value="<?php echo $team1_name;?>"  readonly></input>
			</div>
			<div>
				<input  class="screen1" type="text" name="screen1" id="team1" value="<?php echo $team1;?>" readonly></input>
			</div>
			<div>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
	
		<div class="s2">
			<div>
				<input type="text" name="" value="<?php echo $team2_name;?>"  readonly></input>
			</div>
			<div>
				<input  class="screen2" type="text" name="screen2" id="team2" value="<?php echo $team2;?>" readonly></input>
			</div>
			<div>
				<button onclick="ps(this.value)" value="1" class="twobutton" name="button" align="center">+1</button>
				<button onclick="ss(this.value)" value="1" class="minusbutton2" name="button" align="center">-1</button>
			</div>
		</div>
		</div>
	</form>	
	<div class="end">
        <a href="football_live_result.php?id=<?php //echo $match_id; ?>" >  END MATCH </a>
	</div>
</div>
</body>
</html>

<?php

	mysql_connect("localhost","root","")or die("could not connect to server");
	mysql_select_db("sportsgoa")or die("database not found");
	
//isset is used to check the value if it is present inside that tag
if (isset($_GET['button']))
{
	$team1=$_GET['screen1'];
	$team2=$_GET['screen2'];
    $match_id=$_GET['match_id'];
	$query="update livescore set TEAM1='".$team1."' , TEAM2='".$team2."' where match_id='$match_id'";
	$query;

	if ($res=mysql_query($query)) 
	{
		header("location:add_football_livescore.php");

	}
	else
	{
		echo "data not inserted";
		header("location:add_football_livescore.php");
	}
}

?>