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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
    <style type="text/css">
      .tab_res{
        width: 1000px;
      }
    </style>
    <style type="text/css">
      .a{
        text-align:center;
        padding-left: 1px;
        padding-right: 1px;
      }
      .b{
        padding-left: 5px;
        padding-right: 5px;
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
        //   //*********************proper table *******************//
        // $query = "SELECT * FROM `fixtures` WHERE `match_id` NOT IN (select `match_id` from `results`) AND`event_id`='$event_id'";

        //   $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
        //   if (mysql_num_rows($result) > 0) { 
        //       echo "<table width='80%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
        //       echo"<tr>";
        //       //echo"<td>EVENT ID</td>";
        //       echo"<td class='a'>Team1</td>";
        //       echo"<td class='a'>Team2</td>";
        //       echo"<td class='a'>Team1 Score</td>";
        //       echo"<td class='a'>Team1 Score</td>";
        //       echo"<td class='a'>Final Result</td>";
        //       echo"<td colspan=2 align='center' class='b'>ACTION</td>";
        //       echo"</tr>";
        //       while($row = mysql_fetch_array($result)) { 
        //           echo "<tr>"; 
        //           //echo "<td>".$row['event_id']."</td>"; 
        //           echo "<td class='a'>".$row['team1']."</td>";  
        //           echo "<td >".$row['team2']."</td>";
        //           echo "<td >".$row['team1_score']."</td>";
        //           echo "<td class='a'>".$row['team2_score']."</td>"; 
        //           echo "<td class='a'>".$row['description']."</td>";
                  
        //           //shows the Delete and edit link for each row
        //           //echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
        //           echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_fixture'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
        //           echo "</tr>"; 
        //       } 
        //       echo "</table>"; 
        //   } 
        //   else {  
        //   echo "<div style='color:black'>no match fixtures available...you can add in add fixture menu!</div>"; 
        //   } 

        //   // free result set memory 
        //   mysql_free_result($result); 
          

          //***********************************//
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
                  //echo "<td><a href=delete_result.php?id=".$row['result_id'].">     Delete</a></td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_volleyball'>  Edit <i  class='fa fa-edit'></i></a></td>";
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
        else if ($row['event_category']=='volleyball') 
        {

          $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.set1,results.set2,results.set3,results.set4,results.set5,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) 
          { 
              echo "<table width='450%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
              echo"<tr>";
              echo"<td class='a'>Team1</td>";
              echo"<td class='a'>Team2</td>";
              echo"<td class='a b'>Set1</td>";
              echo"<td class='a b'>Set2</td>";
              echo"<td class='a b'>Set3</td>";
              echo"<td class='a b'>Set4</td>";
              echo"<td class='a b'>Set5</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Team2 Score</td>";
              echo"<td class='a'>Final Result</td>";
              echo"<td colspan=2 align='center' class='b'>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                  echo "<td class='a'>".$row['team1']."</td>";  
                  echo "<td class='a'>".$row['team2']."</td>";
                  echo "<td class='a b'>".$row['set1']."</td>";  
                  echo "<td class='a b'>".$row['set2']."</td>";
                  echo "<td class='a b'>".$row['set3']."</td>";
                  echo "<td class='a b'>".$row['set4']."</td>";
                  echo "<td class='a b'>".$row['set5']."</td>";
                  echo "<td class='a'>".$row['team1_score']."</td>";
                  echo "<td class='a'>".$row['team2_score']."</td>"; 
                  echo "<td class='a'>".$row['description']."</td>";
                  
                  //shows the Delete and edit link for each row
                  //echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_volleyball'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
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
            if (mysql_num_rows($result) > 0) { 
              echo "<table width='400%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
              echo"<tr>";
              //echo"<td>EVENT ID</td>";
              echo"<td class='a'>Team1</td>";
              echo"<td class='a'>Team2</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Team2 Score</td>";
              echo"<td class='a'>Final Result</td>";
              echo"<td colspan=2 align='center' class='b'>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                  //echo "<td>".$row['event_id']."</td>"; 
                  echo "<td class='a'>".$row['team1']."</td>";  
                  echo "<td class='a'>".$row['team2']."</td>";
                  echo "<td class='a'>".$row['team1_score']."</td>";
                  echo "<td class='a'>".$row['team2_score']."</td>"; 
                  echo "<td class='a'>".$row['description']."</td>";
                  
                  //shows the Delete and edit link for each row
                  //echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_football'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
                  echo "</tr>"; 
              } 
              echo "</table>"; 
          } 
          else {  
          echo "<div style='color:black'>no match fixtures available...you can add in add fixture menu!</div>"; 
          } 
        }
          else if($row['event_category']=='cricket')
          {
            $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id"; 
            $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
            if (mysql_num_rows($result) > 0) { 
              echo "<table width='400%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
              echo"<tr>";
              //echo"<td>EVENT ID</td>";
              echo"<td class='a'>Team1</td>";
              echo"<td class='a'>Team2</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Final Result</td>";
              echo"<td colspan=2 align='center' class='b'>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                  //echo "<td>".$row['event_id']."</td>"; 
                  echo "<td class='a'>".$row['team1']."</td>";  
                  echo "<td class='a'>".$row['team2']."</td>";
                  echo "<td class='a'>".$row['team1_score']."</td>";
                  echo "<td class='a'>".$row['team2_score']."</td>"; 
                  echo "<td class='a'>".$row['description']."</td>";
                  
                  //shows the Delete and edit link for each row
                  //echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_football'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
                  echo "</tr>"; 
              } 
              echo "</table>"; 
          } 
          else {  
          echo "<div style='color:black'>no match fixtures available...you can add in add fixture menu!</div>"; 
          } 
          }
          else
          { 
            $query = "Select fixtures.match_id,fixtures.t_date, fixtures.team1,fixtures.team2, results.team1_score,results.team2_score,results.description,results.result_id  from fixtures,results where results.match_id=fixtures.match_id and results.event_id=$event_id";
            $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
            if (mysql_num_rows($result) > 0) 
            { 
              echo "<table width='400%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
              echo"<tr>";
              //echo"<td>EVENT ID</td>";
              echo"<td class='a'>Team1</td>";
              echo"<td class='a'>Team2</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Team1 Score</td>";
              echo"<td class='a'>Final Result</td>";
              echo"<td colspan=2 align='center' class='b'>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                  //echo "<td>".$row['event_id']."</td>"; 
                  echo "<td class='a'>".$row['team1']."</td>";  
                  echo "<td class='a'>".$row['team2']."</td>";
                  echo "<td class='a'>".$row['team1_score']."</td>";
                  echo "<td class='a'>".$row['team2_score']."</td>"; 
                  echo "<td class='a'>".$row['description']."</td>";
                  
                  //shows the Delete and edit link for each row
                  //echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['match_id']."' class='edit_football'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
                  echo "</tr>"; 
              } 
              echo "</table>"; 
          } 
          else
          {  
            echo "<div style='color:black'>no match fixtures available...you can add in add fixture menu!</div>"; 
          } 

        }

      }
    }

          ?>
          </div>
          </div>
          </div>
          </div>
          </div>  
<!-------------------- Bootstrap modals for Adding Results -------------------------------------->       


<!------------ Adding Volleyball Results ------------------>
      <div class="modal fade" id="Volleyball_Add">
        <div class="modal-dialog">
          <div class="modal-content abc" style="background: url('../content/multi_step/images/nike.png');background-size: 500px 480px;height:550px;text-align: center;display: inline-block;margin-top: 140px;">
            <form method="post" id="Volleyball_Add_Result">
              <input type="text" value="" name="event_id" id="event_id" hidden/>
              <input type="text" value="" name="match_id" id="match_id" hidden />
              <input type="text" value="" name="result_id" id="result_id" hidden />
              <center>Update Result</center>
              <div class="row">
                <div class="col-lg-3">  
                 TEAM 1
                  <input type="text" placeholder="India" id="team1" name="team1" value="" required readonly /> 
                </div>
                <div class="col-lg-1 col-lg-offset-3">  
                  V/S 
                </div>
                <div class="col-lg-3 col-lg-offset-1">  
                  TEAM 2 
                  <input type="text" placeholder="MALASIA" name="team2" id="team2" value="" required readonly / > 
                </div>
              </div>
              <br>
              <div class="row">
                set1
                <div class="col-lg-3 col-lg-offset-4">  
                  <input type="text" placeholder="21-20" name="set1" id="set1" required /> 
                </div>
              </div>
              <div class="row">
                set2
                <div class="col-lg-3 col-lg-offset-4">  
                  <input type="text" placeholder="21-19" name="set2" id="set2" required /> 
                </div>
              </div>
              <div class="row">
                set3
                <div class="col-lg-3 col-lg-offset-4">  
                  <input type="text" placeholder="18-21" name="set3" id="set3" required /> 
                </div>
              </div>
              <div class="row">
                set4
                <div class="col-lg-3 col-lg-offset-4">  
                  <input type="text" placeholder="20-21" name="set4" id="set4" /> 
                </div>
              </div>
              <div class="row">
                set5
                <div class="col-lg-3 col-lg-offset-4">  
                  <input type="text" placeholder="21-17" name="set5" id="set5" /> 
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">  
                  SETS WON 
                  <input type="text" placeholder="3" name="team1_score" id="team1_score" required /> 
                </div>
                <div class="col-lg-3 col-lg-offset-5">  
                  SETS WON
                  <input type="text" placeholder="2" name="team2_score" id="team2_score" required />
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-2">  
                    DESCRIPTION / FINAL STATUS 
                </div>
                <div class="col-lg-3 col-lg-offset-2">  
                  <input type="text" placeholder="India won by 3-2 sets" name="description" id="description" required />
                </div> 
              </div>
              <br>
              <div class="row">
                <div class="col-lg-3 col-lg-offset-4"> 
                  <input type="text" value="update_volleyball_result" name="info" id="info" hidden> 
                  <input type="submit" name="btSubmit" id="submit" class="form-control" value="Update">
                </div>
              </div>
            </form>
          </div>
        </div>        
      </div>

      <!------------ Adding Football Results ------------------>
      <div class="modal fade" id="Football_Add">
        <div class="modal-dialog">
          <div class="modal-content abc" style="background: url('../content/multi_step/images/nike.png');background-size: 500px 480px;height:550px;text-align: center;display: inline-block;margin-top: 140px;">
            <form method="post" id="Football_Add_Result">
              <input type="text" value="" name="football_event_id" id="football_event_id" hidden/>
              <input type="text" value="" name="football_match_id" id="football_match_id" hidden />
              <input type="text" value="" name="football_result_id" id="football_result_id" hidden />
              <center>Update Football Result</center>
              <div class="row">
                <div class="col-lg-3">  
                 TEAM 1
                  <input type="text" placeholder="India" id="football_team1" name="football_team1" value="" required readonly /> 
                </div>
                <div class="col-lg-1 col-lg-offset-3">  
                  V/S 
                </div>
                <div class="col-lg-3 col-lg-offset-1">  
                  TEAM 2 
                  <input type="text" placeholder="MALASIA" name="football_team2" id="football_team2" value="" required readonly / > 
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  TEAM 1 SCORE 
                  <input type="text" placeholder="2" value="" name="football_team1_score" id="football_team1_score" required class="form-control" /> 
                </div>
                <div class="col-lg-3 col-lg-offset-6">
                  TEAM 2 SCORE 
                  <input type="text" placeholder="2" value="" name="football_team2_score" id="football_team2_score" required class="form-control" /> 
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">  
                    DESCRIPTION / FINAL STATUS 
                </div>
                <div class="col-lg-3 col-lg-offset-2">  
                  <input type="text" placeholder="India won by 3-2 sets" name="football_description" id="football_description" required />
                </div> 
              </div>
              <br>
              <div class="row">
                <div class="col-lg-3 col-lg-offset-4"> 
                  <input type="text" value="update_football_result" name="info" id="info" hidden> 
                  <input type="submit" name="btSubmit" id="submit" class="form-control" value="Update">
                </div>
              </div>
            </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
  <script>
    $(function() {
      
      $(document).on('click', '.edit_volleyball', function() {
        var edit_volleyball_id = $(this).attr("id");
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                edit_volleyball_id: edit_volleyball_id
            },
            dataType: "json",
            success: function(data) {
                $('#event_id').val(data.event_id);
                $('#match_id').val(data.match_id);
                $('#result_id').val(data.result_id);
                $('#team1').val(data.team1);
                $('#team2').val(data.team2);
                $('#set1').val(data.set1);
                $('#set2').val(data.set2);
                $('#set3').val(data.set3);
                $('#set4').val(data.set4);
                $('#set5').val(data.set5);
                $('#team1_score').val(data.team1_score);
                $('#team2_score').val(data.team2_score);
                $('#description').val(data.description);
                $('#submit').val("Update");
                $('#Volleyball_Add').modal('show');
                
            }
        });
    });

    $('#Volleyball_Add_Result').on("submit", function(event) {
    event.preventDefault();
    if ($('#event_id').val() == "") {
        alert("Event Id required");
    }else {
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: $('#Volleyball_Add_Result').serialize(),
            beforeSend: function() {
              $('#insert').val("Inserting");
              
            },
            success: function(data) {
                $('#Volleyball_Add_Result')[0].reset();
                $('#Volleyball_Add').modal('hide');
                location.reload();
            }
        });
      }
    });

    //football

    $(document).on('click', '.edit_football', function() {
        var edit_football_id = $(this).attr("id");
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                edit_football_id: edit_football_id
            },
            dataType: "json",
            success: function(data) {
                $('#football_event_id').val(data.event_id);
                $('#football_match_id').val(data.match_id);
                $('#football_result_id').val(data.result_id);
                $('#football_team1').val(data.team1);
                $('#football_team2').val(data.team2);
                $('#football_team1_score').val(data.team1_score);
                $('#football_team2_score').val(data.team2_score);
                $('#football_description').val(data.description);
                $('#football_submit').val("Update");
                $('#Football_Add').modal('show');
                
            }
        });
    });

    $('#Football_Add_Result').on("submit", function(event) {
    event.preventDefault();
    if ($('#football_event_id').val() == "") {
        alert("Event Id required");
    }else {
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: $('#Football_Add_Result').serialize(),
            beforeSend: function() {
              $('#insert').val("Inserting");
              
            },
            success: function(data) {
                $('#Football_Add_Result')[0].reset();
                $('#Football_Add').modal('hide');
                location.reload();
            }
        });
      }
    });

    //delete
    $(".delete").click(function(){
      var delete_result_id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this Post?"))
      {
       $.ajax({
         type: "POST",
         url: "deleteMyData.php",
          data: {
              delete_result_id: delete_result_id
          },
         success: function()
         {
          location.reload();
         }
        });
      }

      });

    });
  </script>

  <?php
    include("../footer.php");
  ?>
</body>
</html>