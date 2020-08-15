<?php
  $event_id=$_GET['event_id'];
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

      $q99 = "SELECT `event_category`,`event_type` FROM `events` WHERE `event_id`='$event_id'"; 
      $res99 = mysql_query($q99,  $connection) or die ("Error in query: ".$q99. " ".mysql_error());
      if (mysql_num_rows($res99) > 0) { 
        while($row = mysql_fetch_array($res99)) { 
          $eve_type=$row['event_type'];
          $eve_category=$row['event_category'];
        }
      }
    
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
	  				<h4 style="font-size: 16px;">
             <?php 
              if(session_id()=='')
                {
                  echo "Guest..!";
                }   
              else{

                    $email = $_SESSION['login'];
                    $sql = "SELECT * FROM users WHERE email=:email";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    
                    if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                      echo htmlentities($result->name);
                    }
                  }
                  }    
              ?>     
            </h4>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="event_home.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-home mr-3"></span>Event Home</a>
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
          <li class="active">
            <a href="#"><span class="fa fa-gift mr-3"></span> News Article </a>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        
      <?php
        $query="select news_id,heading,description,date,time,place,pic from news_articles where event_id='$event_id'";
        $res=mysql_query($query);
        if (mysql_num_rows($res) > 0) 
        { 
          while($row = mysql_fetch_array($res))
         {
            echo"
            <div> 
            <div style='margin:0px 0px 10px 0px;width:700px;margin-left:100px;background:white;'>
                    <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:13px;font-weight:700;color:#45484d;text-transform:uppercase;'>
                       <b style='font-size:15px;'><center><a href='news_summary.php?id=".$row['news_id']."'><center><div style='color:white;'>".$row['heading']."</div></center></a></center></b></div>

                    <div style='padding:8px;font-size:20px;height:100px;'>
                  
                   <img src='news_images/".$row['pic']."' style='margin-top:-8px;margin-left:-8px;float:left;height:100px;width:200px;'>
              <br>
                  <div  style='float:left;color:black;margin-left:30px;width:120px;text-transform:uppercase;background:#eee;;'> Date:<br> ".$row['date']." </div>
                        <div style='float:left;background:#eee;margin-left:40px;color:black;width:120px;width:120px;text-transform:uppercase;'>time: <br> ".$row['time']."</div> 
                        <div style='float:left;margin-left:40px;background:#eee;color:black;width:120px;text-transform:uppercase;'>Place:<br> ".$row['place']." </div>                 
                  </div>
            </div>
            <br>
            <br>";
          }
        }
        else
        {
          echo "<div>
          <h6 style='font-size:30px;color:black;margin-top:40px;'> Sorry!... No News Article  or Summary of the Tournament has been Posted Yet.
          <br> Be in Touch, we'll add soon.</h6>"; 
        }
        echo "</div>"; 
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