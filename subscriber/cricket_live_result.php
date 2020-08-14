<?php
//variables retrieved from form are copied
// into simpler variable names
  require("conn.php");
  if ( isset($_POST['team1_score']))
  {

    $event_id=$_POST['event_id'];
    $match_id= $_POST['match_id'];
    $team1_score = $_POST["team1_score"];
    $team2_score = $_POST["team2_score"]; 
    $description = $_POST["description"]; 

    //echo $team1_score;
    //echo $team2_score;
    //echo $description;
    //echo $match_id;
    //echo $event_id;
    $query = "INSERT INTO `results` ( `event_id`,`match_id`,`team1_score`,`team2_score`,`description`) VALUES ('$event_id' ,'$match_id' ,'$team1_score' , '$team2_score' , '$description')"; 
    if($result=mysql_query($query))
    {
      echo "New record inserted with match_ID ".mysql_insert_id();

      $query8="delete from livecricket where match_id='$match_id'";
      $query8;
      if ($res8=mysql_query($query8)) 
      {
          header("location:view_result.php?.php?event_id=$event_id");
      }
      else
      {
          echo "data not inserted";
          header("location:cricket_live_result.php?id=$match_id");
      }
    }
    else
    {
     header("location:livecricket.php?id=$match_id");
    }    
  }
?>

<!doctype html>
<html lang="en">
  <head>
  	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
    <style type="text/css">

    .teams{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      justify-items: center;
      margin-bottom: 7%;
    }
    .des{
      display: grid;
      grid-template-columns: 1fr;
      justify-items: center;
      margin-bottom: 7%;
      
    }
    .ini{
      display: grid;
      grid-template-columns: 1fr 1fr;
      justify-items: center;
      margin-bottom: 7%;
    }

    .msc{
      display: grid;
      grid-template-columns: 1fr;
      justify-items: center;
      margin-left: 15%;
      margin-right: 15%;
    }
    .sbt{
      display: grid;
      grid-template-columns: 1fr;
      justify-items: center;
    }
    .bt{
      background-color:#383bf5;
      color: white;
    }
  </style>
  </head>
  <body style="font-family: Arial, Helvetica, sans-serif;">
		
    <?php
      include("header.php");
    ?>
		<?php 
      $match_id=$_GET['id'];
    //echo $match_id;
      $q="select event_id from fixtures where match_id=".$match_id;
      $re=mysql_query($q);
      $row=mysql_fetch_row($re);
      $event_id=$row[0];

      $query="select event_id,match_id,team1,team2 from fixtures where match_id='$match_id'";
      $res=mysql_query($query);
      $row=mysql_fetch_row($res);

    ?>
    <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(../content/sidebar/images/logo.jpg);"></div>
	  				<h4 style="font-size: 16px;">Khushboo Shetkar</h4>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="subscriber_homepage.php"><span class="fa fa-home mr-3"></span> Your Events</a>
          </li>
          <li>
            <a href="event_home.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-home mr-3"></span>Event Home</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Fixture <span class="caret"></span></a>
              <ul class="list-unstyled components dropdownbut">
                <li>
                  <a href="view_fixture.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-download mr-3 notif"></span> View Fixture</a>
                </li>
                <li>
                  <a href="add_fixture.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-cloud mr-3"></span>Add Fixture</a>
                </li>
              </ul>
          </li>
          <li>
            <a href="view_result.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-trophy mr-3"></span> Result</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Livescore</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-gift mr-3"></span> News Article <span class="caret"></span></a>
            <ul class="list-unstyled components dropdownbut">
                <li class="active">
                    <a href="#"><span class="fa fa-car mr-3"></span> View News Article</a>
                </li>
                <li>
                  <a href="add_news.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->

      <div class="msc">
      <div class="">
      <br><br>
        <div class="panel panel-success">
          <div style="color: white; background:black; text-align: center;" class="panel-heading">
            Add Result
          </div>
          <div style="color: black; " class="panel-body  panel-danger">
          <div id="design">
            <form method="POST">
              <input type="hidden" value="<?php echo$event_id;?>" name="event_id" />
              <input type="hidden" value="<?php echo$match_id;?>" name="match_id" />

            <div class="teams">
              <div> 
                <p style="text-align: center;">TEAM 1</p> 
                <input type="text" placeholder="" value="<?php echo$row[2];?>" name="team1" required  class="form-control" disabled  />  
              </div>
              <div>
                V/S
              </div>
              <div>
              <p style="text-align: center;">TEAM 1</p>
                <input type="text" placeholder="" name="team2" value="<?php echo$row[3];?>" required disabled class="form-control" /> 
              </div> 
            </div> 
               <div class="ini">        
              <?php 

              $match_id=$_GET['id'];

              $qew = "SELECT * FROM livecricket WHERE `match_id`='$match_id'"; 

              //execute query
              $resw = mysql_query($qew,  $connection) or die ("Error in query: ".$q. " ".mysql_error());
              if (mysql_num_rows($resw) > 0) { 
              while($row = mysql_fetch_array($resw)) { 

                  $runs=$row['runs'];
                  $wickets=$row['wickets'];
                  $overs=$row['overs'];
                  $inning=$row['inning'];
                  
                        echo "<div style='text-align: center;'>";
                        echo "TEAM $inning SCORE"; 
                        echo "<input type='text' name='team".$inning."_score' value='".$runs."/".$wickets." (".$overs.")' required class='form-control' /> 
                            </div>";
                                
              }
              }
              ?>
               </div>
              
                <div class="dis">
                  <div class="form-group">
                  <label>Description/Final Status</label> 
                  <input type="text" placeholder="India won by 15 runs" name="description" required class="form-control" />
                  </div>
                </div>
                
                <div class="sbt">
                  
                    <input type="submit" name="btSubmit" id="button1" value="Save" class="bt">
                 
                </div>
               
            </form>
          </div> 
        </div>
      </div>
    </div>
  </div>

    </div>      
  </div>

  <script src="../content/sidebar/js/jquery.min.js"></script>
  <script src="../content/sidebar/js/popper.js"></script>
  <script src="../content/sidebar/js/bootstrap.min.js"></script>
  <script src="../content/sidebar/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

  <?php
    include("../footer.php");
  ?>

</body>
</html> 