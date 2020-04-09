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
    <link rel="stylesheet" href="./content/css/style.css" type="text/css" media="all" />
    

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
          <li class="active">
              <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Fixture </a>
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
  
        $query = "SELECT `team1`,`team2`,`place`,`t_date`,`t_time` FROM `fixtures` where `event_id`='$event_id' ORDER BY  `t_date` ASC"; 
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) 
        { 
        echo"<div class='result-container' >
             <div class='result-team'>
             <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>

            <div class='result-score'>
              <div class='result-score-info'>
              <center>Date:".$row['t_date']."</center></div>  

              <div class='result-score-info'>
              time: ".$row['t_time']." </div><br>

              <div class='result-score-desc'>
              <center> place: ".$row['place']." </center></div>
                 </div>
            </div>

        <br>
        ";       
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