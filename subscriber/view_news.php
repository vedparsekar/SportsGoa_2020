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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
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
          echo "<table width='83%' height='12%' border='1' align='center' bordercolor=black style='color:#3b3e40;align:center;'>"; 
              echo"<tr>";
              //echo"<td>EVENT ID</td>";
              echo"<td class='a'>Pic</td>";
              echo"<td class='a'>Heading</td>";
              echo"<td class='a'>Date</td>";
              echo"<td class='a'>Time</td>";
              echo"<td class='a'>Place</td>";
              echo"<td colspan=2 align='center' class='b'>ACTION</td>";
              echo"</tr>";
          
              $res=mysql_query($query);
              if (mysql_num_rows($res) > 0) 
              { 
                while($row = mysql_fetch_array($res))
                { 
                  echo "<tr>"; 
                  echo "<td class='a' ><img src='news_images/".$row['pic']."' class='img-rounded' width='200px' height='50px' /></td>";
                  echo "<td class='a' style='text-transform:uppercase;color:#337ab7;'> 
                        <a id='".$row['news_id']."' class='view_news'>
                          <center><B>".$row['heading']."</B></center>
                        </a>
                        </td>"; 
                  echo "<td class='a'>".$row['date']."</td>";
                  echo "<td class='a'>".$row['time']."</td>";
                  echo "<td class='a'>".$row['place']."</td>";
                  echo "<td class='a'><a style='color:#337ab7' id='".$row['news_id']."' class='edit_news'>  Update <i  class='fa fa-edit'></i></a></td>";
                  echo "<td class='a'><a style='color:#e85151' class='delete' id='".$row['news_id']."'>  Delete  <i class='fa fa-trash'></i></a></td>";
                  echo "<tr>";      
                }
                echo"</table>";
              }
        
        ?>

    <div class="modal fade" id="news_update">
      <div class="modal-dialog">
        <div class="modal-content abc">
          <form method="post" id="Add_News_Form">
            <div  class="panel-body" style="background: black;margin-top: 147px;" >
              <input type="hidden" value="" name="event_id" id="event_id" />
              <input type="hidden" value="" id="news_id" name="news_id" />
              <div class="row">
                <div class="col-lg-5">
                  <label>Event Heading</label><input type="text" name="heading" id="heading" required>
                </div>
              </div>
              <label><center>Description</center></label> 
              <div class="row">
                <div  class="col-lg-5" >
                  <textarea name="description" id="description" required ></textarea>
                </div>
              </div>
              <label><center>date</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="Date" name="date" id="date" required />
                </div>
              </div>
              <label><center>   time </center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="time" name="time" id="time" required>
                </div>
              </div>
              <label><center>place</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <textarea name="place" id="place" required></textarea>
                </div>
              </div>
              <label><center>picture</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="file" name="news_pic" id="news_pic" >
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                  <br>
                  <input type="text" value="update_news" name="info" id="info" hidden>
                  <button type="submit" name="btnsave" value="Submit" id="submit" class="btn btn-default"> </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!------------------- Bootstrap modal to view news article ------------------->      

    <!---------------------------------------------------------------------------->

      <div class="modal fade" id="view_news">
        <div class="modal-dialog">
          <div class="modal-content abc" style="margin-top: 200px;width: 600px;">
            <div class='row'>
              <div class='col-sm-offset-0 col-sm-12'>
                <div class='panel panel-success'>
                  <div style='color: white; background:black;text-transform:uppercase;' class='panel-heading'>
                    <center><div id='view_heading' style="height:40px;font-size:22px;"> </div></center>
                  </div>
                  <div style='color: black; background:white;' class='panel-body'>
                  <div class='row'>
                     <div class='col-lg-10 col-lg-offset-1'>
                        <br>
                        <div class='row'>
                          <div class='col-lg-3 col-lg-offset-0' style='background:white;'>
                            <textarea id='view_date' class='form-control' style='width:100px;height:30px;' disabled> </textarea>  
                          </div>
                          <div class='row'>
                            <div class='col-lg-3 col-lg-offset-1' style='background:white;'>
                              <textarea id='view_time' class='form-control' style='width:100px;height:30px;margin-left:-10px' disabled> </textarea>            
                            </div>
                          </div>
                          <br/>
                          <div class='row'>
                            <div class='col-lg-3 col-lg-offset-8' style='margin-top:-50px;'>
                              <textarea id='view_place' class='form-control' style='width:100px;height:30px;margin-top:50px;margin-left:30px;' disabled></textarea>            
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-lg-10 col-lg-offset-1' >
                            <br><br><center><div style="font-size:20px;min-height:100px; ;max-height: 400px;width:500px;margin-left:-50px;overflow-y: scroll;" id='view_description'></center>
                              <br>
                            <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
<script>
  $(function() {

  $(document).on('click', '.edit_news', function() {
    var edit_news_id = $(this).attr("id");
    $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
            edit_news_id: edit_news_id
        },
        dataType: "json",
        success: function(data) {
            $('#news_id').val(data.news_id);
            $('#event_id').val(data.event_id);
            $('#heading').val(data.heading);
            $('#description').val(data.description);
            $('#date').val(data.date);
            $('#time').val(data.time);
            $('#place').val(data.place);
            $('#pic').val(data.pic);
            $('#news_update').modal('show');            
        }
      });
  });


  //**********************  view news *******************
  $(document).on('click', '.view_news', function() {
    var edit_news_id = $(this).attr("id");
    $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
            edit_news_id: edit_news_id
        },
        dataType: "json",
        success: function(data) {
            $('#view_heading').html(data.heading);
            $('#view_description').html(data.description);
            $('#view_date').val(data.date);
            $('#view_time').val(data.time);
            $('#view_place').val(data.place);
            $('#view_news').modal('show');            
        }
      });
  });
    $('#Add_News_Form').on("submit", function(event) {
    event.preventDefault();
    if ($('#event_id').val() == "") {
        alert("Event Id required");
    }else {
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: $('#Add_News_Form').serialize(),
            beforeSend: function() {
              $('#insert').val("Inserting");
              
            },
            success: function(data) {
                $('#Add_News_Form')[0].reset();
                $('#news_update').modal('hide');
                location.reload();
            }
        });
      }
    });

  //delete news
  $(".delete").click(function(){
    var delete_news_id = $(this).attr("id");
    if(confirm("Are you sure you want to delete this Post?"))
    {
     $.ajax({
       type: "POST",
       url: "deleteMyData.php",
        data: {
            delete_news_id: delete_news_id
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