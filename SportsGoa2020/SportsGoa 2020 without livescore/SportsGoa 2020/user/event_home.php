<?php
  $event_id=$_GET['event_id'];
  $user_name = $_GET['id'];
//  require("../conn.inc.php");
?>
<!doctype html>
<html lang="en">
  <head>
  	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">

  </head>
  <body>
		
    <?php
      include("header.php");
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
	  				<h4 style="font-size: 16px; color: white">
              <?php 
              if(session_id()=='')
                {
                  echo "Guest..!";
                }   
              else{
                    echo $user_name;
                  }    
              ?>
            </h4>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#"><span class="fa fa-home mr-3"></span>Event Home</a>
          </li>
          <li>
              <a href="view_fixture.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Fixture </a>
          </li>
          <li>
            <a href="view_result.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-trophy mr-3"></span> Result</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Livescore</a>
          </li>
          <li>
            <a href="news_article.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-gift mr-3"></span> News Article </a>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
      <?php
  
        $query = "SELECT `event_name`,`event_category`,`place`,`t_date`,`t_time`,`pic` FROM `events` WHERE `event_id`='$event_id'";
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
        while($row = mysql_fetch_array($result)) { 
          echo "<div class='' style=''>";
          echo "<h1  style='margin-top:-5px;color:white;background:black;width:600px;
          height:100px;'><br> <b style=''>" .$row['event_name']. "</b> </h1>.";
      ?>
      <div class='a'>
      <div style="width: 600px;">
        <div align="center"><img src="user_images/<?php echo $row['pic']; ?>" class="img-rounded" width="600px" height="250px" style='margin-top: -35px;' />
        </div>
      </div>
      </div>
      <?php
      echo "<br><br>
      <div style='background:white;margin-top:-68px;width:600px;' align='center'>

       <h3 style='background:#eee;color:black;'>Place: ".$row['place']. "</h3> <br><br>
       <h3 style='margin-top:-30px;background:#eee;color:black;'> Date:".$row['t_date']. "</h3><br><br> 
       <h3 style='margin-top:-30px;background:#eee;color:black;'> Time:" .$row['t_time']." </h3> " ;
      echo "</div>";
      echo "</div>";
      echo "</div>
            <div>
          <div>
        </div>
      <br> <br> <br> <br>";
        }
      }
    
    ?>  
      </div>
    </div>
    <script src="../content/sidebar/js/jquery.min.js"></script>
    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>
    <?php
      include("../footer.php");
    ?>
  </body>
</html>