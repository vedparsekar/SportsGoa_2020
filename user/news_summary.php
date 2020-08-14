<?php
  $news_id=$_GET["id"];
 // require("../conn.inc.php");
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
    <style type="text/css">
      div.ex1{
        width: 500px;
        height: 120px;
        overflow: auto;
      }
    </style>
  </head>
  <body>
		
    <?php
      include("header.php");

      $query10="select event_id from news_articles where news_id=$news_id";
      $res10=mysql_query($query10);
      while($row = mysql_fetch_array($res10))
       {

        $event_id= $row['event_id'];

       }


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

              if(isset($_GET['comment']))
            {

            $aa=$_GET['news_id'];
            $comment=$_GET['comment'];
            echo $aa;
            echo "<br>";
             $query13="INSERT INTO comment(comment,news_id) VALUES ('$comment','$aa')";

            if($result13=mysql_query($query13))
                  {

            $query11="select event_id from news_articles where news_id=$aa";
            $res11=mysql_query($query11);
            while($row = mysql_fetch_array($res11))
             {
              $eve_id=$row['event_id'];
            }

            header("location:news2.php?id=$aa");
            }
            else
            {
            echo "data not inserted";
            }
            }

            $a=$_GET['id'];
            $query="select news_id,heading,description,date,time,place from news_articles where news_id=$a";
            $res=mysql_query($query);
            while($row = mysql_fetch_array($res))
             {
             
              echo "<div class='row'>";
              echo "<div class='col-sm-offset-2 col-sm-7'>";
                echo "<div class='panel panel-success'>";
                 echo " <div style='color: white; background-color: #b92d2d;;' class='panel-heading'>";
                 echo"  <center>".$row['heading']."</center>";
                echo "    </div>";
                echo "<div style='color: black; background:white;  class='panel-body'>";

               echo " <div class='row'>";
               echo "    <div class='col-lg-10 col-lg-offset-1'>";

               echo 
              " <br>
              <div class='row'>
                  <div class='col-lg-3 col-lg-offset-0' style='background:white;'>

                 <textarea class='form-control' style='width:100px;height:30px;' disabled>".$row['date']."</textarea>  

                </div>

                    <div class='row'>
                        <div class='col-lg-3 col-lg-offset-1' style='background:white;'>

                  <textarea class='form-control' style='width:100px;height:30px;margin-left:-10px' disabled>".$row['time']."</textarea>            

                      </div>
                    </div>
              <br/>
                    <div class='row'>
                        <div class='col-lg-3 col-lg-offset-8' style='margin-top:-50px;'>

                <textarea class='form-control' style='width:100px;height:30px;margin-top:50px;margin-left:30px;' disabled>".$row['place']."</textarea>            

                      </div>
                    </div>
              </div>";
                
              echo " <div class='row'>
                  <div class='col-lg-10 col-lg-offset-1' >
                  <br>
                    <div style='font-size:15px;'> ".$row['description']."</div><br>

                </div>
              </div>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              echo "</div>";
              echo "</div>";
              $aa=$row['news_id'];

              echo "<div class='ex1'>";
               
              $query2="select `comment_id`,`news_id`,`comment` from comment where news_id=$aa";
              $res2=mysql_query($query2);
              while($row = mysql_fetch_array($res2))
               {
                 echo "<textarea class='form-control' style='width:250px;height:30px;' disabled>".$row['comment']."</textarea>";  
               }
              ?>                 
              </div>

              <?php  
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