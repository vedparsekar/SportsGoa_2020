<?php
  $event_id = $_GET['event_id'];
  $subuser_id = $_GET['id'];
?>
<!doctype html>
<html lang="en">
  <head>
  	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
    <link rel="stylesheet" href="style.css">

    <style type="text/css">
      .a{
        text-align:center;
        color : black;
      }
    </style>    
  </head>
  <body>
		
    <?php
      include("header.php");
      $query = "SELECT * FROM `events` WHERE `event_id` ='$event_id'";
          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) { 
              while($row = mysql_fetch_array($result)) {
                $game_category = $row['event_category'];
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
	  				<h4 style="font-size: 16px;"><?php echo $subuser_id;?></h4>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="subuser_homepage.php?id=<?php echo $subuser_id;?>"><span class="fa fa-home mr-3"></span> Your Events</a>
          </li>
          <li>
            <a href="event_home.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subuser_id;?>"><span class="fa fa-home mr-3"></span>Event Home</a>
          </li>
          <li class="active">
            <a href="view_fixture.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subuser_id;?>"><span class="fa fa-trophy mr-3"></span>View Fixture</a>
          </li>
          <li>
            <a href="view_result.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subuser_id;?>"><span class="fa fa-trophy mr-3"></span> Result</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Livescore</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-gift mr-3"></span> News Article <span class="caret"></span></a>
            <ul class="list-unstyled components dropdownbut">
                <li>
                    <a href="view_news.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subuser_id;?>"><span class="fa fa-car mr-3"></span> View News Article</a>
                </li>
                <li>

                  <a href="add_news.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subuser_id;?>"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="">
          
          <div class="vfixtr-heading">
            FIXTURE
          </div>
          <div>
        <?php 

        $query = "SELECT * FROM `fixtures` WHERE `match_id` NOT IN (select `match_id` from `results`) AND`event_id`='$event_id'";

          $result = mysql_query($query,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
          if (mysql_num_rows($result) > 0) { 
              echo "<table width='100%' border='' class='fix-table'>"; 
              echo"<tr>";
              //echo"<td>EVENT ID</td>";
              echo"<td class='a fix-th'>MATCH ID</td>";
              echo"<td class='a fix-th'>TEAM1</td>";
              echo"<td class='a fix-th'>TEAM2</td>";
              echo"<td class='a fix-th'>VENUE</td>";
              echo"<td class='a fix-th'>DATE</td>";
              echo"<td class='a fix-th'>TIME</td>";
              echo"<td colspan=4 align='center' class='a fix-th'>ACTION</td>";
              echo"</tr>";
              while($row = mysql_fetch_array($result)) { 
                  echo "<tr>"; 
                  //echo "<td>".$row['event_id']."</td>"; 
                  echo "<td class='a'>".$row['match_id']."</td>";  
                  echo "<td >".$row['team1']."</td>";
                  echo "<td >".$row['team2']."</td>";
                  echo "<td class='a'>".$row['place']."</td>"; 
                  echo "<td class='a'>".$row['t_date']."</td>";
                  echo "<td class='a'>".$row['t_time']."</td>"; 
                  
                  //shows the Delete and edit link for each row
                  echo "<td class='a'><a style='color:#e85151;' class='delete' id='".$row['match_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<td class='a'><a style='color:#337ab7;' id='".$row['match_id']."' class='edit_fixture'>  Edit <i  class='fa fa-edit'></i></a></td>"; 
                  ?>
                  <td class="a"><a style="color:#337ab7;" id="<?php echo $row['match_id']; ?>" 
                    
                    <?php 
                        if($game_category=="hockey")
                        {
                          ?> class="add_football_result" <?php
                        }else if($game_category=="badminton")
                        {
                          ?> class="add_volleyball_result" <?php
                        }
                        else if($game_category=="volleyball")
                        {
                          ?> class="add_volleyball_result" <?php
                        }else if($game_category=="cricket")
                        {
                          ?> class="add_football_result" <?php
                        }else if($game_category=="football")
                        {
                          ?> class="add_football_result" <?php
                        }
                        else{

                        }
                      ?> 
                        >    Add Result</a></td>
                  <?php 
                  echo "<td class='a'><a href=subuser_live_check.php?id=".$row['match_id'].">    Add live score</a></td>";
                  echo "</tr>"; 
              } 
              echo "</table>"; 
          } 
          else {  
          echo "no match fixtures available...you can add in add fixture menu!"; 
          } 

          // free result set memory 
          mysql_free_result($result); 
          mysql_close($connection);

          ?>
          <div class="vfix-btn"> 
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#Add_fixture" class="f-btn btn">Add New Fixture</button>
          </div>
          </div>
   <div class="modal fade" id="Add_fixture">
    <div class="modal-dialog">
      <div class="modal-content abc" style="background-color:white;text-align: center;display: inline-block;margin-top: 160px; padding:3%">
        <div style="margin-left: 30px;">
          <h2 style="margin-bottom: 0px;"> Add Fixture </h2>
          <br>
        <form method="post" class="form121" id="Add_Fixture_Form">
          <input type="text" value="<?php echo $event_id; ?>" id="event_id" name="event_id" hidden>
          <input type="text" value="" id="match_id" name="match_id" hidden>
          <div class="form-group">
          <label> Team1</label> <input type="text" placeholder="Team1" id="team1" name="team1" class="form-control" required>
          </div>

          <div class="form-group">
          <label>Team2</label> <input type="text" placeholder="Team2" id="team2" name="team2" class="form-control" required>
          </div>          
                    
          <div class="form-group">
          <label>Location</label>  <input type="text" placeholder="Venue" name="place" id="place" class="form-control" required >
          </div>
          
          <div class="form-group">
          <label>Date</label>  <input type="date" placeholder="" id="t_date" name="t_date" class="form-control" required>
          </div>
          
          <div class="form-group">
          <label>Time</label>  <input type="TIME" placeholder="Time" id="t_time" name="t_time" class="form-control" required>
          </div>
          
          <br />
          <input type="text" value="add_fixture" name="info" id="info" hidden>
          <div style="align-content: center;margin-top: -15px;">
            <button type="submit" style="" class="reg-btn" name="signup" id="submit">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
     
<!-------------------- Bootstrap modals for Adding Results -------------------------------------->       

<!------------ Adding Volleyball Results ------------------>
      <div class="modal fade" id="Volleyball_Add">
        <div class="modal-dialog">
          <div class="modal-content abc" style="background-color:white;text-align: center;display: inline-block;margin-top: 160px; padding:3%">
            <form method="post" id="Volleyball_Add_Result">
              <input type="text" value="" name="R_event_id" id="R_event_id" hidden/>
              <input type="text" value="" name="R_match_id" id="R_match_id" hidden />
              <div style="background-color: #b92d2d;padding:2%;color:white;">Update Result</div>

              <div class="result-ed-team">
                <div>  
                 TEAM 1
                  <input type="text" placeholder="India" id="R_team1" name="R_team1" value="" class="form-control" required readonly /> 
                </div>
                <div>  
                  V/S 
                </div>
                <div>  
                  TEAM 2 
                  <input type="text" placeholder="MALASIA" name="R_team2" id="R_team2" value="" class="form-control" required readonly / > 
                </div>
              </div>

              <br>
              <div class="form-group">
                <label>SET 1</label> 
                  <input type="text" placeholder="21-20" name="set1" id="set1" class="form-control" required /> 
                </div>
              
                <div class="form-group">
                <label>SET 1</label> 
                  <input type="text" placeholder="21-19" name="set2" id="set2" class="form-control" required /> 
                </div>
              
              <div class="form-group">
                <label>SET 1</label> 
                  <input type="text" placeholder="18-21" name="set3" id="set3" class="form-control" required /> 
                </div>
              
                <div class="form-group">
                <label>SET 1</label>  
                  <input type="text" placeholder="20-21" name="set4" id="set4" class="form-control" /> 
                </div>
              
              <div class="form-group">
                <label>SET 1</label> 
                  <input type="text" placeholder="21-17" name="set5" id="set5" class="form-control" /> 
                </div>
              
                <div class="form-group">  
                  <label>SETS WON</label> 
                  <input type="text" placeholder="3" name="team1_score" id="team1_score" class="form-control" required /> 
                
                  <label>SETS WON</label>
                  <input type="text" placeholder="2" name="team2_score" id="team2_score" class="form-control" required />
                </div>
              
              <br>
              <div class="form-group">  
                   <label> DESCRIPTION / FINAL STATUS </label>   
                  <input type="text" placeholder="India won by 3-2 sets" name="description" id="description" required />
                </div> 
        
                <div class="form-group">  
                  <input type="text" value="add_volleyball_result" name="info" id="info" hidden> 
                  <input type="submit" name="btSubmit" id="submit" class="form-control"  style="background-color: #b92d2d; color:white" value="Submit">
                </div>
            
            </form>
          </div>
        </div>        
      </div>

      <!------------ Adding Football Results ------------------>
      <div class="modal fade" id="Football_Add">
        <div class="modal-dialog">
        <div class="modal-content abc" style="background-color:white;text-align: center;display: inline-block;margin-top: 160px; padding:3%">
            <form method="post" id="Football_Add_Result">
              <input type="text" value="" name="Rf_event_id" id="Rf_event_id" hidden/>
              <input type="text" value="" name="Rf_match_id" id="Rf_match_id" hidden />
              <div style="background-color: #b92d2d;padding:2%;color:white;">Update <?php echo $game_category; ?> Result</div>
              <br>
              <div class="result-ed-team">
                <div>
                 TEAM 1
                  <input type="text" placeholder="India" id="Rf_team1" name="Rf_team1" value="" class="form-control" required readonly /> 
                </div>
                <div>  
                  V/S 
                </div>
                <div>  
                  TEAM 2 
                  <input type="text" placeholder="MALASIA" name="Rf_team2" id="Rf_team2" value="" class="form-control" required readonly / > 
                </div>
              </div>
              <br>

              <div class="form-group">
                  <label>TEAM 1</label>
                  <input type="text" placeholder="2" value="" name="football_team1_score" id="football_team1_score" required class="form-control" /> 
                
                  <label>TEAM 2</label>
                  <input type="text" placeholder="2" value="" name="football_team2_score" id="football_team2_score" required class="form-control" /> 

                </div>
              
                <div class="form-group">  
              <label> DESCRIPTION / FINAL STATUS </label>  
                  <input type="text" placeholder="India won by 3-2 sets" name="football_description" id="football_description" class="form-control" required />
                </div> 

        
              <br>
              <div class="form-group">  
                  <input type="text" value="add_football_result" name="info" id="info" hidden> 
                  <input type="submit" name="btSubmit" id="submit" class="form-control" value="Submit" style="background-color: #b92d2d; color:white">
                </div>
            
            </form>
          </div>
        </div>        
      </div>

    <!--------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-------------------> 
    <!--------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx----------------------->                           
      </div>      
		</div>

    <script src="../content/sidebar/js/jquery.min.js"></script>
    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>     
<script>  
 $(document).ready(function() {
  $('#add').click(function() {
      $('#insert').val("Insert");
      $('#Add_Fixture_Form')[0].reset();
  });

  $('#Add_Fixture_Form').on("submit", function(event) {
    event.preventDefault();
    if ($('#event_id').val() == "") {
        alert("Event Id required");
    }else {
            $.ajax({
            url: "insert.php",
            method: "POST",
            data: $('#Add_Fixture_Form').serialize(),
            beforeSend: function() {
            },
            success: function(data) {
              $('#Add_Fixture_Form')[0].reset();
              $('#Add_fixture').modal('hide');
              alert("Fixture Updated Successfully!...");
              location.reload();
          }
        });
      }
  });

  $(document).on('click', '.edit_fixture', function() {
        var edit_match_id = $(this).attr("id");
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                edit_match_id: edit_match_id
            },
            dataType: "json",
            success: function(data) {
                $('#event_id').val(data.event_id);
                $('#match_id').val(data.match_id);
                $('#team1').val(data.team1);
                $('#team2').val(data.team2);
                $('#place').val(data.place);
                $('#t_date').val(data.t_date);
                $('#t_time').val(data.t_time);
                $('#info').val("update_fixture");          
                $('#submit').val("Update");
                $('#Add_fixture').modal('show');
            }
        });
    });

//************************* Add Result ************
    
    $(document).on('click', '.add_volleyball_result', function() {
      var edit_match_id = $(this).attr("id");
      $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
              edit_match_id: edit_match_id
          },
          dataType: "json",
          success: function(data) {
              $('#R_event_id').val(data.event_id);
              $('#R_match_id').val(data.match_id);
              $('#R_team1').val(data.team1);
              $('#R_team2').val(data.team2);
              $('#Volleyball_Add').modal('show');              
          }
        });
    });
       
    $(document).on('click', '.add_football_result', function() {
      var edit_match_id = $(this).attr("id");
      $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
              edit_match_id: edit_match_id
          },
          dataType: "json",
          success: function(data) {
              $('#Rf_event_id').val(data.event_id);
              $('#Rf_match_id').val(data.match_id);
              $('#Rf_team1').val(data.team1);
              $('#Rf_team2').val(data.team2);
              $('#Football_Add').modal('show');              
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
                alert("Result Added Successfully... You can check it in Results Section");
                location.reload();
            }
        });
      }
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
                alert("Result Added Successfully... You can check it in Results Section");
                location.reload();
            }
        });
      }
    });
          
});
 </script>

 <script type="text/javascript">
$(function() {
$(".delete").click(function(){
  var delete_match_id = $(this).attr("id");
  if(confirm("Are you sure you want to delete this Post?"))
  {
   $.ajax({
     type: "POST",
     url: "deleteMyData.php",
      data: {
          delete_match_id: delete_match_id
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