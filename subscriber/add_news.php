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
      label{
        margin-bottom: 20px;
        float:left;
        margin-left: 50px;
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
                <li>
                    <a href="view_news.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-car mr-3"></span> View News Article</a>
                </li>
                <li class="active">
                  <a href="#"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
         <form method="post" id="signup-form" enctype="multipart/form-data" class="form-horizontal">
          <div  class="panel-body" style="background: black;" >
              <div class="row">
                <div class="col-lg-5">
                  <input type="text" value="<?php echo $event_id;?>" name="event_id" id="event_id" hidden>
                  <label>Event Heading</label>
                  <textarea name="heading" id="heading" required> </textarea> 
                </div>
              </div>
              <label><center>Description</center></label> 
              <div class="row">
                <div  class="col-lg-5" >
                  <textarea class="form-control" name="description" id="description" ></textarea>
                </div>
              </div>
              <label><center>date</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="Date" name="date" id="date" class="form-control" />
                </div>
              </div>
              <label><center> Time </center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="time" id="time" class="form-control" name="time">
                </div>
              </div>
              <label><center>Place</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <textarea class="form-control" name="place" id="place"></textarea>
                </div>
              </div>
              <label><center>Picture</center></label> 
              <div class="row">
                <div  class="col-lg-5">
                  <input type="file" style="opacity: 1;" name="pic" id="pic">
                </div>
                <input type="text" value="add_news" name="info" id="info" hidden>
              </div>
              <div class="row">
                <div class="col-lg-3 col-lg-offset-2">
                  <br>
                  <button type="submit" id="submit" style="width: 150px;height: 30px;background-color: green;color: black;" name="Submit" class="btn btn-default"> </button>
                </div>
              </div>
            </div>
          </form> 
        </div>      
		  </div>

    <script src="../content/sidebar/js/jquery.min.js"></script>
    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>
    

        <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>     
<script>  
 $(document).ready(function() {
  $('#add').click(function() {
      $('#insert').val("Insert");
      $('#insert_form')[0].reset();
  });
 
  $('#signup-form').on("submit", function(event) {
        event.preventDefault();
        if ($('#heading').val() == "") {
            alert("News Heading Required");
        } else if ($('#description').val() == '') {
            alert("description Required");
        } else if ($('#place').val() == '') {
            alert("place Required");
        } else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#signup-form').serialize(),
                success: function(data) {
                    alert("News Successfully Added!....");
                    location.reload(true);
                }
            });
        }
    });        
});
    <?php
      include("../footer.php");
    ?>
  </body>
</html>