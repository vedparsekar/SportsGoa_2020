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
          <li class="active">
            <a href="#"><span class="fa fa-trophy mr-3"></span> Result</a>
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
  
        $q = "SELECT `event_category` FROM `events` WHERE `event_id`='$event_id'"; 

      //execute query
      $res = mysql_query($q,  $connection) or die ("Error in query: ".$q. " ".mysql_error());
      if (mysql_num_rows($res) > 0) { 
      while($row = mysql_fetch_array($res)) { 

      if($row['event_category']=='badminton')
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.set1,results.set2,results.set3,results.set4,results.set5,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC"; 
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 

          echo"
          <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                  <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                     <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>


                 <div style='padding:8px;font-size:13px;background:white;'>
          <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team1']."  ".$row['team1_score']."  
           - ".$row['team2_score']."  ".$row['team2']."</div>
          <div align='center'>
          <br>
          <div style='float:left;margin-left:-170px;'>
             <h6 style='float:left;margin-left:215px;'>Set 1</h6> <textarea class='form-control' style='width:100px;height:30px;margin-right:200px;' disabled>".$row['set1']."</textarea><br>

             <h6 style='float:left;margin-left:215px;'>Set 2</h6> <textarea class='form-control' style='width:100px;height:30px;margin-right:200px;' disabled>".$row['set2']."</textarea><br>
          </div>


             <h6 style='float:left;margin-left:215px;margin-top:-60px;'>Set 3</h6> 
             <div style='margin-left:250px;'>
             <textarea class='form-control' style='width:100px;height:30px;float:left;margin-top:-70px;' disabled>".$row['set3']."</textarea><br>
          </div>
             <h6 style='float:left;margin-left:400px;margin-top:-90px;'>Set 4</h6> <textarea class='form-control' style='width:100px;height:30px;margin-left:450px;float:left;margin-top:-100px;' disabled>".$row['set4']."</textarea><br>

             <h6 style='float:left;margin-left:400px;margin-top:-40px;'>Set 5</h6> <textarea class='form-control' style='width:100px;height:30px;margin-left:450px;margin-top:-50px;float:left;' disabled>".$row['set5']."</textarea><br>
          </div>
          <br><br><br>
          <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$row['description']."  </div>
                   </div>
              </div>
          <br>    

          ";

                            
        }
      }
      // free result set memory 
      mysql_free_result($result); 
      mysql_close($connection);
      
    }

      elseif($row['event_category']=='volleyball')
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.set1,results.set2,results.set3,results.set4,results.set5,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC"; 
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 

        echo"
        <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                   <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>


               <div style='padding:8px;font-size:13px;background:white;'>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team1']."  ".$row['team1_score']."  
         - ".$row['team2_score']."  ".$row['team2']."</div>
        <div align='center'>
        <br>
        <div style='float:left;margin-left:-170px;'>
           <h6 style='float:left;margin-left:215px;'>Set 1</h6> <textarea class='form-control' style='width:100px;height:30px;margin-right:200px;' disabled>".$row['set1']."</textarea><br>

           <h6 style='float:left;margin-left:215px;'>Set 2</h6> <textarea class='form-control' style='width:100px;height:30px;margin-right:200px;' disabled>".$row['set2']."</textarea><br>
        </div>


           <h6 style='float:left;margin-left:215px;margin-top:-60px;'>Set 3</h6> 
           <div style='margin-left:250px;'>
           <textarea class='form-control' style='width:100px;height:30px;float:left;margin-top:-70px;' disabled>".$row['set3']."</textarea><br>
        </div>
           <h6 style='float:left;margin-left:400px;margin-top:-90px;'>Set 4</h6> <textarea class='form-control' style='width:100px;height:30px;margin-left:450px;float:left;margin-top:-100px;' disabled>".$row['set4']."</textarea><br>

           <h6 style='float:left;margin-left:400px;margin-top:-40px;'>Set 5</h6> <textarea class='form-control' style='width:100px;height:30px;margin-left:450px;margin-top:-50px;float:left;' disabled>".$row['set5']."</textarea><br>
        </div>
        <br><br><br>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$row['description']."  </div>
                 </div>
            </div>
        <br>    

        ";

                    
         }
        }
        // free result set memory 
        mysql_free_result($result); 
        mysql_close($connection);
        
      }

      elseif($row['event_category']=='cricket')
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC";
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 
        $match_id=$row['match_id'];
        $team1_name=$row['team1'];
        $team2_name=$row['team2'];
        $team1_score=$row['team1'];
        $team2_score=$row['team2'];
        $description=$row['description'];


        mysql_connect("localhost","root","")or die("could not connect to server");
        mysql_select_db("sportsgoa")or die("database not found");

        $q15 = "SELECT * FROM livecricket WHERE `match_id`='$match_id' and toss='W'"; 
        $res15=mysql_query($q15);
        if (mysql_num_rows($res15) > 0) 
        { 
        while($row = mysql_fetch_array($res15))
         {

            $team_name=$row['team_name'];
            $choice=$row['choice'];

        }
        }

        echo"
        <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                   <b><center>".$team1_name."  V/S  ".$team2_name."</center></b></div>



               <div style='padding:8px;font-size:13px;background:white;'>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> 

        <h4>".$team_name." won the Toss and Elected to ".$choice."  First </h4>

        </div>

        <br>";
            $query16="select * from livecricket where match_id='$match_id'";

            $result16 = mysql_query($query16) or die ("Error in query: ".$query16. " ".mysql_error());

            while($row = mysql_fetch_array($result16))
             { 
                $team_name=$row['team_name'];
                $runs=$row['runs'];
                $wickets=$row['wickets'];
                $overs=$row['overs'];
                $inning=$row['inning'];

        if($inning==1)
          {
          echo " <br><br>     
              <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;margin-top:-50px;float:left;width:590px;' align='center'>
          

          <h5 style='float:left;margin-left:70px;font-size:12pt;text-transform:capitalize;color:black;'> Inning ".$inning."</h5> 
          <h5 style='float:left;margin-left:40px;font-size:12pt;text-transform:capitalize;color:black;'> ".$team_name."</h5> 
         

        <textarea class='form-control' style='width:100px;height:30px;background-color:#eee;float:left;margin-left:20px;' disabled>
            ".$runs." / ".$wickets."  
        </textarea> 
        <div style='margin-left:15px;float:left;'>
          <h5 style='float:left;'>".$overs."</h5>
          <h5 style='margin-left:10px;float:left;'>overs</h5> 
        </div>        
            </div>";
          }
          if($inning==2)
          {
             echo " <br><br>     
              <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;margin-top:-50px;float:left;width:590px;' align='center'>
          

        <div style='font-size:12pt;text-transform:capitalize;color:black;'>
          <h5 style='float:left;margin-left:70px;'> Inning ".$inning."</h5> 
          <h5 style='float:left;margin-left:41px;'> ".$team_name."</h5> 
        </div> 

        <textarea class='form-control' style='width:100px;height:30px;background-color:#eee;float:left;margin-left:20px;' disabled>
        ".$runs." / ".$wickets."  </textarea>
        <div style='margin-left:15px;float:left;'>
          <h5 style='float:left;'margin-left:100px;'>".$overs."</h5>
          <h5 style='margin-left:10px;float:left;'>overs</h5> 
        </div>       
            </div>";
         

        }
        }

        echo"


        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$description."  </div>
                 </div>
            </div>
        <br>    

        ";

                 }
        }
        // free result set memory 
        mysql_free_result($result); 
        mysql_close($connection);
       
     }
      elseif($row['event_category']=='football')
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC";
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 

        echo" <br>
        <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                   <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>


               <div style='padding:8px;font-size:13px;background:white;'>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team1']."  ".$row['team1_score']."  
         - ".$row['team2_score']."  ".$row['team2']."</div>
        <br>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$row['description']."  </div>
                 </div>
            </div>
        <br>    

        ";
                   
        }
        }
        // free result set memory 
        mysql_free_result($result); 
        mysql_close($connection);

      }
      elseif($row['event_category']=='hockey')
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC";
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 

        echo" <br>
        <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                   <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>


               <div style='padding:8px;font-size:13px;background:white;'>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team1']."  ".$row['team1_score']."  
         - ".$row['team2_score']."  ".$row['team2']."</div>
        <br>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$row['description']."  </div>
                 </div>
            </div>
        <br>    

        ";
                   
        }
        }
        // free result set memory 
        mysql_free_result($result); 
        mysql_close($connection);

      }
      else
      {

        $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id ORDER BY  `t_date` DESC";
        $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        if (mysql_num_rows($result) > 0) { 
            
            while($row = mysql_fetch_array($result)) { 

        echo"
        <div style='margin:0px 0px 10px 0px;width:600px;margin-left:150px;' >
                <div style='border-bottom:1px #e8e8e8 solid;background-color:black;padding:8px;font-size:19px;font-weight:700;color:white;text-transform:uppercase;'>
                   <b><center>".$row['team1']."  V/S  ".$row['team2']."</center></b></div>



               <div style='padding:8px;font-size:13px;background:white;'>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team1']."  ".$row['team1_score']." </div>

        <br>

        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'>".$row['team2_score']."  ".$row['team2']."</div>
        <br>
        <div style='font-size:12pt;text-transform:capitalize;color:black;background-color:#eee;' align='center'> ".$row['description']."  </div>
                 </div>
            </div>
        <br>    

        ";
      
        }
        }
        // free result set memory 
        mysql_free_result($result); 
        mysql_close($connection);
      }


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