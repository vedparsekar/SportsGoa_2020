<!doctype html>
<html lang="en">
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../content/sidebar/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    crossorigin="anonymous">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript">
      function getData(ecategory,etype, divid){
          $.ajax({
              url: 'load_events.php',
              data: 'event_type='+etype+'&event_category='+ecategory , 
              success: function(html) {
                  var ajaxDisplay = document.getElementById(divid);
                  ajaxDisplay.innerHTML = html;
              }
          });
      }
  </script>
  
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
          <li class="active">
            <a href="#"><span class="fa fa-home mr-3"></span> Your Events</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-trophy mr-3"></span> Add Event</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-download mr-3"></span> Calender</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-car mr-3 notif"></span> Contact Us</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-gift mr-3 notif"></span> Livescore</a>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
     <div id="content" class="p-4 p-md-5 pt-5">
        <!--content here  -->  
        <form method="post">
            <br>
            
            select category
            <select name="e_category" id="e_category"  class="form-control" onchange="getData(this.value, event_type.value, 'displaydata')" style="width: 150px;">
                <option value="1">select</option>
                <option value="hockey">hockey</option>
                <option value="volleyball">volleyball</option>
                <option value="cricket">cricket</option>
                <option value="football">football</option>
            </select>
            <br>
            
            select event type 
            <select name="event_type" id="event_type"  class="form-control" onchange="getData(e_category.value, this.value, 'displaydata')" style="width: 150px;">
              <option value="1">All Events</option>  
              <option value="local">Local Tournaments</option> 
              <option value="university">University Tournaments</option>  
            </select>
            <br><br>
              <div class="table" id="displaydata">
              </div>
        </form> 
      </div>
		</div>

    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>
   
    <?php
      include("../footer.php");
    ?>
  </body>
</html>