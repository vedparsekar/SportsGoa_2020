
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
  <link rel="stylesheet" href="../content/multi_step/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .abc{
      text-align: center;
      margin-left: 30px;
      color: white;
      height: 500px;
      width: 600px;
    }
    b{
      float: left;
      margin-left: 20px; 
    }
    .form12{
      margin-left: 160px;
      margin-bottom: 20px;
    }
    .reg-btn{
      display: inline-block;
      font-size: 19px;
      text-align: center;
      padding: 8px 70px;
      background-color: #4CAF50;
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
          <li class="active">
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
        <div class="container" style="background: url('../content/multi_step/images/nike.png');background-size: 600px 480px;height:600px;text-align: center;display: inline-block;width: 800px;margin-top: -45px; ">
        <h2 style="margin-top: -16px;margin-bottom: 16px;">Add New Post</h2>
        <form method="POST" id="signup-form" class="signup-form">
            <h3>
                <span class="title_text">Basic Infomation</span>
            </h3>
            <fieldset style="padding-top: 30px;">
                <div class="fieldset-content1">
                    <div class="form-group">
                        <label for="event_name" class="form-label">Event Name</label>
                        <input type="text" name="event_name" id="event_name" placeholder="Event Name" />
                    </div>
                    <div class="form-group">
                        <label for="event_type" class="form-label">Tournament</label>
                        <select name="event_type">
                          <option value=""> Select </option>        
                    <option value="local">Local Tournament</option> 
                    <option value="university">University Tournament</option>  
                  </select>
                    </div>
                    <div class="form-group">
                        <label for="event_category" class="form-label">Game Type</label>
                    <select name="event_category" required>
                            <option value="">select</option>
                      <option value="cricket">Cricket</option>
                      <option value="football">Football</option>
                      <option value="volleyball">Volleyball</option>
                      <option value="hockey">Hockey</option>
                  </select>
                    </div>
                    <div class="form-group">
                        <label for="venue" class="form-label">Location</label>
                        <input type="text" name="venue" id="venue" placeholder="Tournament Venue" />
                    </div>

                    <div class="form-group">
                        <label for="date" class="form-label">Tournament Date</label>
                        <input type="date" name="t_date" id="datepic" placeholder="Tournament Date" />
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
                        <label for="your_avatar" class="form-label">Upload Banner Picture</label>
                        <div class="form-file">
                            <input type="file" name="pic" id="your_avatar" class="custom-file-input" />
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
                            <select name="subuser_id" id="subuser_id">
                              <option value="">select</option>
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                              <option value="">4</option>
                            </select>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#yess">  Create Subuser a/c </a>
                    </div>
                </div>
                <div class="fieldset-footer">
                    <span>Step 2 of 2</span>
                </div>
            </fieldset>
            </form>
        </div>
        <!------- Subuser Registration Form(Pop up)-------->
    <div class="modal fade" id="yess">
    <div class="modal-dialog">
      <div class="modal-content abc" style="background: url('../content/multi_step/images/nike.png');background-size: 500px 480px;height:550px;text-align: center;display: inline-block;">
        <div style="margin-left: 30px;">
          <h2 style="margin-bottom: 0px;">Subuser Registration</h2>
          <br>
        <form method="post" class="form121">
          <b>Name</b>
          <div class="form12">
            <input type="text" placeholder="Name" name="name">
          </div>
          <b>Email</b>
          <div class="form12">
            <input type="email" placeholder="Email" name="email">
          </div>
          <b>Phone</b>
          <div class="form12">
            <input type="text" placeholder="Phone" name="phone">
          </div>
          <b>Password</b>
          <div class="form12">
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <b>Confirm Password</b>
          <div class="form12">
            <input type="password" placeholder="Confirm Password" name="cpassword" required>
          </div>
          <br />
          <div style="align-content: center;margin-top: -15px;">
            <button type="submit" style="" class="reg-btn" value="Signup" name="signup" id="signup">Submit</button>
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

    <?php
      include("../footer.php");
    ?>
  </body>
</html>