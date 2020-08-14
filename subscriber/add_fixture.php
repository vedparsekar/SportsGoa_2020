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
                <li class="active">
                  <a href="#"><span class="fa fa-cloud mr-3"></span>Add Fixture</a>
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
                <li>
                  <a href="add_news.php?event_id=<?php echo $event_id; ?>"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
          <div  class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-lg-offset-0" style="background: black;margin-top: -43px;">
                <br><br>
                <div class="panel panel-success">
                <div style="color: white; background:black;" class="panel-heading">
                <center>Add Fixture</center></div>
                <div style="color: black; " class="panel-body  panel-danger">
                  <div id="design">
                    <form action="add.php" method="post" name="syForm">
                      <input type="hidden" value="<?php //echo$display_id;?>" name="event_id" />
                      <div class="row">
                        <div class="col-lg-3" style="margin-left: 30px;">
                          TEAM 1 
                          <input type="text" placeholder="Goa" name="team1" required class="form-control" /> 
                        </div>
                        <div class="row" style="margin-top: 20px;">
                          <div class="col-lg-3 col-lg-offset-1">
                            V/S 
                          </div>
                          <div class="col-lg-9 " style="margin-left: 130px;margin-top: -45px;">
                              TEAM 2 
                            <input type="text" placeholder="Kerala" name="team2" required class="form-control" /> 
                          </div>
                        </div>
                      </div>
                      <br/><br/>
                    <div class="row">
                      <div class="col-lg-1 col-lg-offset-3">
                        VENUE:
                      </div>
                      <div class="col-lg-3">
                        <input type="text" placeholder="Venue" name="place" required class="form-control" /> 
                      </div>
                    </div>
                    <br/><br/>
                    <div class="row">
                      <div class="col-lg-1 col-lg-offset-3">
                        DATE
                      </div>
                      <div class="col-lg-3">
                        <input type="date" placeholder="yyyy-mm-dd" name="t_date" required class="form-control" />
                      </div> 
                    </div>
                    <br/><br/>
                    <div class="row">
                      <div class="col-lg-1 col-lg-offset-3">
                        TIME
                      </div>
                      <div class="col-lg-3 ">
                        <input type="time" placeholder="eg 10:30 am" name="t_time" required class="form-control" />
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-1 col-lg-offset-5">
                        <input type="submit" name="btSubmit" id="button1" value="Save" >
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

    <script src="../content/sidebar/js/jquery.min.js"></script>
    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>
    
    <?php
      include("../footer.php");
    ?>
  </body>
</html>