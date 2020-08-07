<?php
  $event_id = $_GET['event_id'];
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
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
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
      <div id="content" class="p-4 p-md-5 pt-5">
        <?php

          $query="select news_id,heading,description,date,time,place,pic from news_articles where event_id=$event_id";

          echo"
            <div class='table-responsive' style='width:1000px;margin-top:-50px;margin-left:-15px;'>
                <table id='tb'class='table  table-bordered'>
                  <thead>
                    <tr>
                    <th style='background:#232338;color:#fff;height:100px;'>Pic</th>
                    <th style='background:#232338;color:#fff'>heading</th>
                    <th style='background:#232338;color:#fff'>Date</th>
                    <th style='background:#232338;color:#fff'>Time</th>
                    <th style='background:#232338;color:#fff'>Place</th>
                    <th style='background:#232338;color:#fff' colspan=4><center>ACTION</center></th>       
                    
                  </tr>
                </thead>
                  <tbody style='background:#dcdcdc;color:#030000'>
                ";
              $res=mysql_query($query);
              if (mysql_num_rows($res) > 0) 
              { 

               
                while($row = mysql_fetch_array($res))
                { 
                  echo "<tr>"; 
                  echo "<td><img src='news_images/".$row['pic']."' class='img-rounded' width='200px' height='50px' /></td>";
                  echo "<td> 

                        <a data-toggle='modal' data-target='#view_news'>
                          <center>".$row['heading']."</center>
                        </a>

                        </td>"; 
                  echo "<td>".$row['date']."</td>";
                  echo "<td>".$row['time']."</td>";
                  echo "<td>".$row['place']."</td>";
                  echo "<td><a href=delete_news.php?id=".$row['news_id'].">Delete</a></td>";
                  echo "<td><a data-toggle='modal' data-target='#news_update'>Update</a></td>";
                  //echo "<td><a href=news_update.php?id=".$row['news_id'].">Update</a></td>";
                  echo "<tr>";      
                }
                echo"</tbody>
                </table>
                </div>";
              }
        
        ?>
        <div class="modal fade" id="news_update">
          <div class="modal-dialog">
            <div class="modal-content abc">
              <form method="post" enctype="multipart/form-data" class="form-horizontal">
          <div  class="panel-body" style="background: black;" >
            <input type="hidden" value="<?php echo $event_id;?>" name="event_id" />
              <div class="row">
                <div class="col-lg-5">
                  <label>Event Heading</label><input type="text" name="Heading"  class="form-control" required>
                </div>
              </div>
              <label><center>Description</center></label> 
              <div class="row">
                <div  class="col-lg-5" >
                  <textarea class="form-control" name="Description" ></textarea>
                </div>
              </div>
              <label><center>date</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="Date" name="date" class="form-control" />
                </div>
              </div>
              <label><center>   time </center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="time" class="form-control" name="time">
                </div>
              </div>
              <label><center>place</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <textarea class="form-control" name="place"></textarea>
                </div>
              </div>
              <label><center>picture</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="file" name="news_pic">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                  <br>
                  <button type="submit" name="btnsave" class="btn btn-default"> </button>
                </div>
              </div>
            </div>
          </form>
            </div>
          </div>
        </div>
            
        <div class="modal fade" id="view_news">
          <div class="modal-dialog">
            <div class="modal-content abc">
              <?php
              //$news_id=$_GET['id'];
              $query="select news_id,heading,description,date,time,place from news_articles where news_id=127";
              $res=mysql_query($query);
              while($row = mysql_fetch_array($res))
               {
             
                echo "<div class='row'>";
                echo "<div class='col-sm-offset-2 col-sm-7'>";
                  echo "<div class='panel panel-success'>";
                   echo " <div style='color: white; background:black;' class='panel-heading'>";
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
                  <b><center>*Description*</center></b>
                    <div style='font-size:20px;'> ".$row['description']."</div><br>

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
      </div>      

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