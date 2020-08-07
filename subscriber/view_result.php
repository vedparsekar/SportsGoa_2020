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
    <style type="text/css">
      .tab_res{
        width: 1000px;
      }
    </style>
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
          <li class="active">
            <a href="#"><span class="fa fa-trophy mr-3"></span> Result</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Livescore</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-gift mr-3"></span> News Article <span class="caret"></span></a>
            <ul class="list-unstyled components dropdownbut">
                <li>
                    <a href="view_news.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-car mr-3"></span> View News Article</a>
                </li>
                <li>
                  <a href="add_news.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5" class="tab_res" style="width: 1000px;">
        <div  class="container-fluid">
          <div class="row">
          <div class="col-lg-3 col-lg-offset-0" >

          <?php 
             $event_id= "2"; 


          $q = "SELECT `event_category` FROM `events` WHERE `event_id`='$event_id'"; 

          //execute query
          $res = mysql_query($q,  $connection) or die ("Error in query: ".$q. " ".mysql_error());
          if (mysql_num_rows($res) > 0) { 
          while($row = mysql_fetch_array($res)) { 

          if($row['event_category']=='badminton')
          {
          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.set1,results.set2,results.set3,results.set4,results.set5,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) 
          {            
             //echo"<td>EVENT ID</td>";
              //echo"<td>MATCH ID</td>";
              //echo"<td>DATE</td>";
              echo"<td>TEAM 1</td>";
              echo"<td>TEAM 2</td>";
              echo"<td>TEAM1 SCORE</td>";
              echo"<td>TEAM2 SCORE</td>";
              echo"<td>FINAL RESULT</td>";
              echo"<td colspan=2>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                 // echo "<td>".$row['event_id']."</td>"; 
                  //echo "<td>".$row['match_id']."</td>";
                  //echo "<td>".$row['t_date']."</td>";  
                  echo "<td>".$row['team1']."</td>";
                  echo "<td>".$row['team2']."</td>";
                  echo "<td>".$row['team1_score']."</td>";
                  echo "<td>".$row['team2_score']."</td>";
                  echo "<td>".$row['description']."</td>"; 
                   
                  
                  //shows the Delete and edit link for each row
                  echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td> <a data-toggle='modal' data-target='#Volleyball_Add'>   Update</a></td>";
                 // echo "<td><a href=football_result_edit.php?id=".$row['result_id'].">    Update</a></td>"; 
                  echo "</tr>"; 
              } 
              echo"</tbody>
                </table>
                </div>"; 
          }
          else {  
          echo "no results available...you can add in add results menu!"; 
          } 
          }
          elseif ($row['event_category']=='volleyball') {

          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.set1,results.set2,results.set3,results.set4,results.set5,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) 
          { 
           
             //echo"<td>EVENT ID</td>";
              //echo"<td>MATCH ID</td>";
              //echo"<td>DATE</td>";
              echo"<td>TEAM 1</td>";
              echo"<td>TEAM 2</td>";
              echo"<td>TEAM1 SCORE</td>";
              echo"<td>TEAM2 SCORE</td>";
              echo"<td>FINAL RESULT</td>";
              echo"<td colspan=2>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                 // echo "<td>".$row['event_id']."</td>"; 
                  //echo "<td>".$row['match_id']."</td>";
                  //echo "<td>".$row['t_date']."</td>";  
                  echo "<td>".$row['team1']."</td>";
                  echo "<td>".$row['team2']."</td>";
                  echo "<td>".$row['team1_score']."</td>";
                  echo "<td>".$row['team2_score']."</td>";
                  echo "<td>".$row['description']."</td>"; 
                   
                  
                  //shows the Delete and edit link for each row
                  echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td> <a data-toggle='modal' data-target='#Volleyball_Add'>   Update</a></td>";
                 // echo "<td><a href=football_result_edit.php?id=".$row['result_id'].">    Update</a></td>"; 
                  echo "</tr>"; 
              } 
              echo"</tbody>
                </table>
                </div>"; 
          }
          else {  
          echo "no results available...you can add in add results menu!"; 
          }  
          }

          elseif($row['event_category']=='football')
          {
          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) 
          { 
            echo"
            <div class='table-responsive' style='width:1000px;margin-top:-40px;margin-left:-15px;'>
                <table id='tb'class='table  table-bordered'>
                  <thead>
                    <tr>
                    <th style='background:#232338;color:#fff'>TEAM 1</th>
                    <th style='background:#232338;color:#fff'>TEAM 2</th>
                    <th style='background:#232338;color:#fff'>TEAM1 SCORE</th>
                    <th style='background:#232338;color:#fff'>TEAM2 SCORE</th>
                    <th style='background:#232338;color:#fff'>FINAL RESULT</th>
              <th style='background:#232338;color:#fff' colspan=4><center>ACTION</center></th>       
                    
                  </tr>
                </thead>
                  <tbody style='background:#dcdcdc;color:#030000'>
            
            ";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                 // echo "<td>".$row['event_id']."</td>"; 
                  //echo "<td>".$row['match_id']."</td>";
                  //echo "<td>".$row['t_date']."</td>";  
                  echo "<td>".$row['team1']."</td>";
                  echo "<td>".$row['team2']."</td>";
                  echo "<td>".$row['team1_score']."</td>";
                  echo "<td>".$row['team2_score']."</td>";
                  echo "<td>".$row['description']."</td>"; 
                   
                  
                  //shows the Delete and edit link for each row
                  echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td> <a data-toggle='modal' data-target='#Football_Add'>   Update</a></td>";
                //  echo "<td><a href=football_result_edit.php?id=".$row['result_id'].">    Update</a></td>"; 
                  echo "</tr>"; 
              } 
              echo"</tbody>
                </table>
                </div>"; 
          } 
          else {  
          echo "no results available...you can add in add results menu!"; 
          } 
          }


          elseif($row['event_category']=='cricket')
          {
          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) { 
              echo"
            <div class='table-responsive' style='width:1000px;margin-top:-40px;margin-left:-15px;'>
                <table id='tb'class='table  table-bordered'>
                  <thead>
                    <tr>
                        <th style='background:#232338;color:#fff'>DATE</th>
                      <th style='background:#232338;color:#fff'>TEAM 1</th>
                      <th style='background:#232338;color:#fff'>TEAM 2</th>
                      <th style='background:#232338;color:#fff'>TEAM1 SCORE</th>
                      <th style='background:#232338;color:#fff'>TEAM2 SCORE</th>
                      <th style='background:#232338;color:#fff'>FINAL RESULT</th>
                      <th style='background:#232338;color:#fff' colspan=4><center>ACTION</center></th>       
                  </tr>
                </thead>
                  <tbody style='background:#dcdcdc;color:#030000'>
            
            ";
           
             //echo"<td>EVENT ID</td>";
              
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                 // echo "<td>".$row['event_id']."</td>"; 
                  //echo "<td>".$row['match_id']."</td>";
                  //echo "<td>".$row['t_date']."</td>";  
                  echo "<td>".$row['team1']."</td>";
                  echo "<td>".$row['team2']."</td>";
                  echo "<td>".$row['team1_score']."</td>";
                  echo "<td>".$row['team2_score']."</td>";
                  echo "<td>".$row['description']."</td>"; 
                   
                  
                  //shows the Delete and edit link for each row
                  echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td> <a data-toggle='modal' data-target='#Cricket_Add'>   Update</a></td>";
                //  echo "<td><a href=football_result_edit.php?id=".$row['result_id'].">    Update</a></td>"; 
                  echo "</tr>"; 
              } 
              echo"</tbody>
                </table>
                </div>"; 
          } 
          else {  
          echo "no results available...you can add in add results menu!"; 
          } 
          }


          else
          {
          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) { 
          echo"
            <div class='table-responsive' style='width:1000px;margin-top:-40px;'>
                <table id='tb'class='table  table-bordered'>
                  <thead>
                    <tr>
                    <th style='background:#232338;color:#fff'>DATE</th>
                    <th style='background:#232338;color:#fff'>TEAM 1</th>
                    <th style='background:#232338;color:#fff'>TEAM 2</th>
                    <th style='background:#232338;color:#fff'>TEAM1 SCORE</th>
                    <th style='background:#232338;color:#fff'>TEAM2 SCORE</th>
                    <th style='background:#232338;color:#fff'>FINAL RESULT</th>
              <th style='background:#232338;color:#fff' colspan=4><center>ACTION</center></th>       
                    
                  </tr>
                </thead>
                  <tbody style='background:#dcdcdc;color:#030000'>
            
            ";
           
             //echo"<td>EVENT ID</td>";
              //echo"<td>MATCH ID</td>";
              //echo"<td>DATE</td>";
              echo"<td>TEAM 1</td>";
              echo"<td>TEAM 2</td>";
              echo"<td>TEAM1 SCORE</td>";
              echo"<td>TEAM2 SCORE</td>";
              echo"<td>FINAL RESULT</td>";
              echo"<td colspan=2>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                 // echo "<td>".$row['event_id']."</td>"; 
                  //echo "<td>".$row['match_id']."</td>";
                  //echo "<td>".$row['t_date']."</td>";  
                  echo "<td>".$row['team1']."</td>";
                  echo "<td>".$row['team2']."</td>";
                  echo "<td>".$row['team1_score']."</td>";
                  echo "<td>".$row['team2_score']."</td>";
                  echo "<td>".$row['description']."</td>"; 
                   
                  
                  //shows the Delete and edit link for each row
                  echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td> <a data-toggle='modal' data-target='#Hockey_Add'>   Update</a></td>";
                //  echo "<td><a href=football_result_edit.php?id=".$row['result_id'].">    Update</a></td>"; 
                  echo "</tr>"; 
              } 
              echo"</tbody>
                </table>
                </div>"; 
          } 
          else {  
          echo "no results available...you can add in add results menu!"; 
          } 
          }
          }
          }

          // free result set memory 
          mysql_free_result($result); 
          mysql_close($connection);


          ?>
          </div>
          </div>
          </div>
          </div>
          </div>  
          <!-------------------- Bootstrap modals for Adding Results -------------------------------------->       

      <!------------ Adding Hockey Results ------------------>
              <div class="modal fade" id="Hockey_Add">
                <div class="modal-dialog">
                  <div class="modal-content abc">
                    <form method="POST" >
                      <input type="hidden" value="<?php //echo$event_id;?>" name="event_id" />
                      <input type="hidden" value="<?php //echo$match_id;?>" name="match_id" />
                      <div class="row">
                        <div class="col-lg-10">
                          TEAM 1 
                          <input type="text" placeholder="team1" class="form-control" value="<?php //echo$row[2];?>" name="team1" required /> 
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-10 col-lg-offset-4">
                        V/S 
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-10">
                          TEAM 2 
                          <input type="text" placeholder="team2" name="team2" class="form-control" value="<?php //echo$row[3];?>" required />
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-10">
                          DESCRIPTION / FINAL STATUS 
                          <input type="text" placeholder="India won by 15 runs" name="description" class="form-control" required />
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-10">
                          <input type="submit" name="btSubmit" id="button1" value="Save" class="form-control" >
                        </div>
                      </div>
                    </form>
                  </div>
                </div>        
              </div>

      <!------------ Adding Volleyball Results ------------------>
              <div class="modal fade" id="Volleyball_Add">
                <div class="modal-dialog">
                  <div class="modal-content abc">
                    <form method="POST">
                      <input type="hidden" value="<?php //echo$event_id;?>" name="event_id" />
                      <input type="hidden" value="<?php //echo$match_id;?>" name="match_id" />
                      <center>Add Volleyball Result</center>
                      <div class="row">
                        <div class="col-lg-3">  
                         TEAM 1
                          <input type="text" placeholder="India" name="team1" value="<?php //echo$row[2];?>" class="form-control" required disabled/> 
                        </div>
                        <div class="col-lg-1 col-lg-offset-3">  
                          V/S 
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">  
                          TEAM 2 
                          <input type="text" placeholder="MALASIA" name="team2" class="form-control" value="<?php //echo$row[3];?>" required disabled/ > 
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="text" placeholder="21-20" name="set1" class="form-control" required /> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="text" placeholder="21-19" name="set2" class="form-control" required /> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="text" placeholder="18-21" name="set3" class="form-control" required /> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="text" placeholder="20-21" name="set4" class="form-control"  /> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="text" placeholder="21-17" name="set5" class="form-control"  /> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">  
                          SETS WON 
                          <input type="text" placeholder="3" name="team1_score" class="form-control" required /> 
                        </div>
                        <div class="col-lg-3 col-lg-offset-5">  
                          SETS WON
                          <input type="text" placeholder="2" name="team2_score" class="form-control" required />
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-2">  
                            DESCRIPTION / FINAL STATUS 
                        </div>
                        <div class="col-lg-3 col-lg-offset-2">  
                          <input type="text" placeholder="India won by 3-2 sets" name="description" class="form-control" required />
                        </div> 
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">  
                          <input type="submit" name="btSubmit" id="button1" class="form-control" value="Save" >
                        </div>
                      </div>
                    </form>
                  </div>
                </div>        
              </div>
      
      <!------------ Adding Football Results ------------------>
              <div class="modal fade" id="Football_Add">
                <div class="modal-dialog">
                  <div class="modal-content abc">
                          <form method="POST">
                            <input type="hidden" value="<?php //echo$event_id;?>" name="event_id" />
                            <input type="hidden" value="<?php //echo$match_id;?>" name="match_id" />
                            <center>Add Football Result</center>
                            <div class="row" style="margin-left: 30px;">
                              <div class="col-lg-3">
                              TEAM 1 
                                <input type="text" placeholder="" value="<?php //echo$row[2];?>" name="team1" required 
                                class="form-control" disabled  />  
                              </div>
                              <div class="col-lg-1 col-lg-offset-3"><BR>
                                V/S
                              </div>
                              <div class="col-lg-3 col-lg-offset-2">
                                TEAM 2 
                                <input type="text" placeholder="" name="team2" value="<?php //echo$row[3];?>" required disabled class="form-control" /> 
                              </div>
                            </div>
                        <br/><br/>
                        <div class="row">
                          <div class="col-lg-3">
                            TEAM 1 SCORE 
                            <input type="text" placeholder="2" name="team1_score" required class="form-control" /> 
                          </div>
                          <div class="col-lg-3 col-lg-offset-6">
                            TEAM 2 SCORE 
                            <input type="text" placeholder="2" name="team2_score" required class="form-control" /> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-lg-offset-4">
                            DESCRIPTION / FINAL STATUS 
                          </div> 
                        </div>
                        <div class="col-lg-3 col-lg-offset-4">
                        <input type="text" placeholder="match draw" name="description" required class="form-control" />
                        </div>
                        <br><br>
                        <div class="row">
                          <div class="col-lg-3 col-lg-offset-4">
                          <input type="submit" name="btSubmit" id="button1" value="Save" class="form-control">
                          </div>
                        </div>
                      </form>
                    </div> 
                  </div>
                </div>

      <!------------ Adding Cricket Results ------------------>
              <div class="modal fade" id="Cricket_Add">
                <div class="modal-dialog">
                  <div class="modal-content abc">
                    <div  class="container-fluid">
                      <div class="col-lg-12 col-lg-offset-0" style="background: black;">
                        <br><br>
                          <div class="panel panel-success">
                            <div style="color: white; background:black;" class="panel-heading">
                              <center>Add Cricket Result</center>
                            </div>
                            <div style="color: black; " class="panel-body  panel-danger">
                              <div id="design">
                                <form method="POST">
                                  <input type="hidden" value="<?php //echo$event_id;?>" name="event_id" />
                                  <input type="hidden" value="<?php //echo$match_id;?>" name="match_id" />
                                  <div class="row">
                                    <div class="col-lg-3">
                                      TEAM 1 
                                      <input type="text" placeholder="" value="<?php //echo$row[2];?>" name="team1" required 
                                      class="form-control" disabled  />  
                                    </div>
                                      <div class="col-lg-1 col-lg-offset-2"><BR>
                                         V/S
                                      </div>
                                      <div class="col-lg-3 col-lg-offset-2">
                                        TEAM 2 
                                        <input type="text" placeholder="" name="team2" value="<?php //echo$row[3];?>" required disabled class="form-control" /> 
                                      </div>  
                                  </div>
                                  <br/><br/>

                                  <div class="row">
                                    <div class="col-lg-3">
                                      TEAM 1 SCORE 
                                      <input type="text" placeholder="212/5 (45.2)" name="team1_score" required class="form-control" /> 
                                    </div>
                                    <div class="col-lg-3 col-lg-offset-5">
                                      TEAM 2 SCORE 
                                      <input type="text" placeholder="201/10 (47.5)" name="team2_score" required class="form-control" /> 
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-10">
                                      DESCRIPTION / FINAL STATUS 
                                    </div> 
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-5 col-lg-offset-3">
                                      <input type="text" placeholder="India won by 15 runs" name="description" required class="form-control" />
                                    </div>
                                    <br><br><br>
                                    <div class="row">
                                      <div class="col-lg-3 col-lg-offset-4">
                                        <input type="submit" name="btSubmit" id="button1" value="Save" class="form-control">
                                      </div>
                                    </div>
                                  </form>
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>      
                      </div>
                    </div>        
                  </div>  

    <!--------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-------------------> 
      
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