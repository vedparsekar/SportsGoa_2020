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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
    <link rel="stylesheet" href="style.css">

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
      $subscriber_id = "mfc@11";
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
              <!-- already done 
                <li>
                  <a href="add_post.php"><span class="fa fa-trophy mr-3"></span> Add Event</a>
                </li>
              -->
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
      <form method="post" class="evnt-form">
        <div class="evnt-cat">
          <div>
            <p class="evnt-p">select category</p>
            <select name="e_category" id="e_category"  class="form-control" onchange="getData(this.value, event_type.value, 'displaydata')">
                <option value="1">All Games</option>
                <option value="hockey">hockey</option>
                <option value="volleyball">volleyball</option>
                <option value="cricket">cricket</option>
                <option value="football">football</option>
            </select>
          </div>

          <div>
            <p class="evnt-p">select event type</p>
              <select name="event_type" id="event_type"  class="form-control" onchange="getData(e_category.value, this.value, 'displaydata')">
                <option value="1">All Events</option>  
                <option value="local">Local Tournaments</option> 
                <option value="university">University Tournaments</option>  
              </select>
          </div>

          <div>
          <p class="evnt-p">Add Post</p>
            <input type="button" class="btn btn-danger" name="addButton" value="Add Post" data-toggle="modal" data-target="#add_post"> 
          </div>
        </div>
        <br>
        <div class="table evnt-tble" id="displaydata">
        </div>
    
        </form>

      <div class="modal fade" id="add_post">
        <div class="modal-dialog">
          <div class="modal-content abc" style="background: url('../content/multi_step/images/nike.png');background-size: 500px 480px;height:550px;text-align: center;display: inline-block;">
          <div class="container" style="background: url('../content/multi_step/images/nike.png');background-size: 600px 480px;height:600px;text-align: center;display: inline-block;width: 800px;margin-top: -45px; ">
            <h2 style="margin-top: -16px;margin-bottom: 16px;">Add New Post</h2>
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                  <span class="title_text">Basic Infomation</span>
              </h3>
              <fieldset style="padding-top: 30px;">
                <div class="fieldset-content1">
                    <input type="text" value="<?php echo $subscriber_id; ?>" name="subscriber_id" id="subscriber_id" hidden>
                    <div class="form-group">
                        <label for="event_name" class="form-label">Event Name </label>
                        <input type="text" name="event_name" id="event_name" placeholder="Event Name" />
                    </div>
                    <div class="form-group">
                        <label for="event_type" class="form-label">Tournament</label>
                        <select name="event_type" id="event_type" >
                          <option value=""> Select </option>        
                    <option value="local">Local Tournament</option> 
                    <option value="university">University Tournament</option>  
                  </select>
                    </div>
                    <div class="form-group">
                        <label for="event_category" class="form-label">Game Type</label>
                    <select name="event_category" id="event_category" required>
                            <option value="">select</option>
                      <option value="cricket">Cricket</option>
                      <option value="football">Football</option>
                      <option value="volleyball">Volleyball</option>
                      <option value="hockey">Hockey</option>
                  </select>
                    </div>
                    <div class="form-group">
                        <label for="place" class="form-label">Location</label>
                        <input type="text" name="place" id="place" placeholder="Tournament Venue" />
                    </div>

                    <div class="form-group">
                        <label for="Date" class="form-label">Tournament Date</label>
                        <input type="Date" name="t_date" id="t_date" placeholder="Tournament Date" />
                    </div>
                </div>
                <div class="fieldset-footer">
                    <span>Step 1 of 2</span>
                </div>
            </fieldset>

            <h3>
                <span class="title_text">Detail Information</span>
            </h3>
            <fieldset>

                <div class="fieldset-content1"  style="padding-top: 30px;">
                    <div class="form-textarea">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Time" class="form-label">Tournament Time</label>
                        <input type="Time" name="t_time" id="t_time" placeholder="Tournament Time" />
                    </div>
                    <div class="form-group">
                        <label for="your_avatar" class="form-label">Upload Banner Picture</label>
                        <div class="form-file">
                            <input type="file" name="pic" id="pic" class="custom-file-input" />
                            <span id='val'></span>
                            <span id='button'>Select File</span>
                        </div>
                    </div>
                    <div class="form-textarea">
                        <label for="rules" class="form-label">Rules</label>
                        <textarea name="rules" id="rules" placeholder="Rules"></textarea>
                    </div>
                    <div class="form-select">
                        <label for="subuser_id" class="form-label"> Select Subuser_id</label>
                        <div class="form-select-item">
                          <?php
                            echo"<select name='subuser_id' id='subuser_id' class='form-control' required> ";
                            $queryii="select subuser_id from sub_users";
                            $resultii = mysql_query($queryii,$connection) or die ("Error in query: ".$queryii. " ".mysql_error());
                          if (mysql_num_rows($resultii) > 0) 
                          { 
                            echo"<option value=''>Select </option>";
                            while($row = mysql_fetch_array($resultii)) 
                            { 
                              echo"<option value='$row[0]'>".$row['subuser_id']."</option>";
                            }
                          }
                          ?>
                            </select>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#addSubuser">  Create Subuser a/c </a>
                    </div>
                    <input type="text" value="add_event" name="info" id="info" hidden>
                </div>
                <div class="fieldset-footer">
                    <span>Step 2 of 2</span>
                </div>
            </fieldset>
            <div style="align-content: center;margin-top: -15px;">
              <button type="submit" style="" class="reg-btn" value="Signup" name="insert_post" id="insert_post">Submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!------- Subuser Registration Form(Pop up)-------->
  <div class="modal fade" id="addSubuser">
    <div class="modal-dialog">
      <div class="modal-content abc" style="background: url('../content/multi_step/images/nike.png');background-size: 500px 480px;height:550px;text-align: center;display: inline-block;">
        <div style="margin-left: 30px;">
          <h2 style="margin-bottom: 0px;">Subuser Registration</h2>
          <br>
        <form method="post" class="form121" id="insert_form">
          
          <div class="form-group">
          <b>Name</b>  <input type="text" placeholder="Name" id="subuser_name2" name="subuser_name2">
          </div>
          
          <div class="form-group">
          <b>Gender</b>  <select name="gender" id="gender" name="gender">  
             <option value="male">Male</option>  
             <option value="female">Female</option>  
            </select>
          </div>
          
          <div class="form-group">
          <b>User ID</b>  <input type="text" placeholder="ex. name@123" id="subuser_id2" name="subuser_id2">
          </div>
          
          <div class="form-group">
          <b>Dob</b>  <input type="date" placeholder="" id="dob" name="dob">
          </div>
          
          <div class="form-group">
          <b>Email</b>  <input type="email" placeholder="Email" id="email" name="email">
          </div>
          
          <div class="form-group">
          <b>Phone</b>  <input type="text" placeholder="Phone" id="mobile" name="mobile">
          </div>
          
          <div class="form-group">
          <b>Password</b>  <input type="password" placeholder="Password" id="password" name="password" required>
          </div>
          
          <div class="form-group">
          <b>Confirm Password</b>  <input type="password" placeholder="Confirm Password" name="cpassword" required>
          </div>
          <br />
          <input type="text" value="add_subuser" name="info" id="info" hidden>
          <div style="align-content: center;margin-top: -15px;">
            <button type="submit" style="" class="reg-btn" value="Signup" name="signup" id="insert">Submit</button>
          </div>
        </form>
    </div>
    </div>
    </div>
  </div>

      </div>
    </div>

    <script src="../content/sidebar/js/popper.js"></script>
    <script src="../content/sidebar/js/bootstrap.min.js"></script>
    <script src="../content/sidebar/js/main.js"></script>

    <script src="../content/multi_step/vendor/jquery/jquery.min.js"></script>
    <script src="../content/multi_step/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../content/multi_step/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../content/multi_step/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="../content/multi_step/vendor/minimalist-picker/dobpicker.js"></script>
    <script src="../content/multi_step/vendor/jquery.pwstrength/jquery.pwstrength.js"></script>
    <script src="../content/multi_step/js/main.js"></script>
    

<!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>     
<script>  
 $(document).ready(function() {
    $('#add').click(function() {
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
    });

    $('#insert_form').on("submit", function(event) {
          event.preventDefault();
          if ($('#subuser_name2').val() == "") {
              alert("Subuser Name Required");
          } else if ($('#subuser_id2').val() == '') {
              alert("subuser id Required");
          } else if ($('#email').val() == '') {
              alert("Email Required");
          } else if ($('#dob').val() == '') {
              alert("dob Required");
          } else if ($('#password').val() == '') {
              alert("password Required");
          } else {
              $.ajax({
                  url: "insert.php",
                  method: "POST",
                  data: $('#insert_form').serialize(),
                  beforeSend: function() {
                    $('#insert').val("Inserting");
                  },
                  success: function(data) {
                      $('#insert_form')[0].reset();
                      $('#addSubuser').modal('hide');
                  }
              });
          }
      });
      
    $('#signup-form').on("submit", function(event) {
          event.preventDefault();
          if ($('#event_name').val() == "") {
              alert("Event Name Required");
          } else if ($('#event_type').val() == '') {
              alert("event_type Required");
          } else if ($('#event_category').val() == '') {
              alert("event_category Required");
          } else if ($('#place').val() == '') {
              alert("place Required");
          } else if ($('#t_date').val() == '') {
              alert("date Required");
          } else if ($('#t_time').val() == '') {
              alert("Time Required");
          } else if ($('#description').val() == '') {
              alert("description Required");
          } else {

              $.ajax({
                  url: "insert.php",
                  method: "POST",
                  data: $('#signup-form').serialize(),
                  beforeSend: function() {
                    $('#insert_post').val("Inserting");                    
                  },
                  success: function(data) {
                      $('#signup-form')[0].reset();
                      $('#add_post').modal('hide');
                      alert("Post Successfully sent for verification!....");
                      window.location = "subscriber_homepage.php";
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