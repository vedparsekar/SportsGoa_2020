<?php
session_start();
include('conn.inc.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SportsGoa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="content/css/style.css" type="text/css" media="all" />
	<!--// css -->
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="content/css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- font -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="content/js/jquery-1.11.1.min.js"></script>
	<script src="content/js/bootstrap.js"></script>
	<script src="content/js/SmoothScroll.min.js"></script>
	<script src="content/js/jarallax.js"></script>
</head> 
<body >

	<!------Login Form(Pop up)------>
	<?php

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$type = $_POST['type'];
		//$password = md5($_POST['password']);
		if($type == "1")
		{
			$sql = "SELECT * FROM users WHERE email=:email and password=:password";
			$query = $dbh->prepare($sql);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				$_SESSION['login'] = $_POST['email'];
				foreach ($results as $result)
				{	
					$_SESSION['username'] = $result->user_name;
					$_SESSION['uname'] = $result->name;
					$_SESSION['utype'] = $type;
				}
				$currentpage = $_SERVER['REQUEST_URI'];
				//echo "<script>alert('Success');</script>";
				//echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
			} else {

				echo "<script>alert('Invalid Details');</script>";
			}
		}
		else if($type == "2")
		{
			$sql = "SELECT * FROM subscribers WHERE email=:email and password=:password";
			$query = $dbh->prepare($sql);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				$_SESSION['login'] = $_POST['email'];
				foreach ($results as $result)
				{	
					$_SESSION['username'] = $result->subscriber_id;
					$_SESSION['uname'] = $result->name;
					$_SESSION['utype'] = $type;
				}
				$currentpage = $_SERVER['REQUEST_URI'];
				//echo "<script>alert('Success');</script>";
				//echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
			} else {

				echo "<script>alert('Invalid Details');</script>";
			}
		}
		else if($type == "3")
		{
			$sql = "SELECT * FROM sub_users WHERE email=:email and password=:password";
			$query = $dbh->prepare($sql);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				$_SESSION['login'] = $_POST['email'];
				foreach ($results as $result)
				{	
					$_SESSION['username'] = $result->subuser_id;
					$_SESSION['uname'] = $result->name;
					$_SESSION['utype'] = $type;
				}
				$currentpage = $_SERVER['REQUEST_URI'];
				//echo "<script>alert('Success');</script>";
				//echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
			} else {

				echo "<script>alert('Invalid Details');</script>";
			}
		}
	}

	?>

		<div id="login" class="login-modal">
		<form class="login-modal-content" method="post">
			<div class="loginform-title">
				<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h3>Login</h3>
			</div>
			<div class="loginform-content">
				<label><b>Email</b></label>
				<input type="email" placeholder="Email" name="email">
				<label><b>Password</b></label>
				<input type="password" placeholder="Password" name="password" required>
				<select name="type" id="type" class="regform-content" style="width:100%;">
				<option value="1">User</option> 
                <option value="2">Subcriber</option>  
                <option value="3">Subuser</option> 
                 
              </select>
				<br />
				<label><input type="checkbox" name="remember">Remember me</label>
				<label class="forgot-password" onclick="document.getElementById('forgotpassword').style.display='block'; document.getElementById('login').style.display='none'">Forgot
					Password?</label>
				<a href="#"><input type="submit" class="login-btn" value="login" name="login" id="login"></a>
				<p onclick="document.getElementById('register').style.display='block'; document.getElementById('login').style.display='none'">Don't
					have an account? Sign Up Now</p>
			</div>
		</form>
	</div>
	<!------/Login Form(Pop up)------>

	<!-------Registration Form(Pop up)-------->
	<?php
	//error_reporting(0);
	if (isset($_POST['signup'])) {
		if ($_POST['password'] != $_POST['cpassword']) {
			echo "<script>alert('Passwords dont match. Please try again');</script>";
		} else {
			$name = $_POST['name'];
			$user_name = $_POST['user_name'];
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$mobile = $_POST['phone'];
			//$password = md5($_POST['password']);
			$password = $_POST['password'];
			//$pass=mt_rand(1000,10000);
			//$password=md5($pass);
			//echo "<script>alert(".$user_name."+' '+".$name."+' '+".$email."+' '+".$password."+'!');</script>";
			$sql = "INSERT INTO  users(user_name,name,gender,dob,email,password) VALUES(:user_name,:name,:gender,:dob,:email,:password)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$query->bindParam(':name', $name, PDO::PARAM_STR);
			$query->bindParam(':gender', $gender, PDO::PARAM_STR);
			$query->bindParam(':dob', $dob, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			//echo "<script>alert(".$user_name."+' '+".$name."+' '+".$email."+' '+".$password."+'!');</script>";
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			if ($lastInsertId) {
				echo "<script>alert('Registration successfull.Now you can login');</script>";
			} else {
				echo "<script>alert('Something went wrong. Please try again');</script>";
			}
			
		}
	}

	?>

	<!-------/Registration Form(Pop up)-------->
	<div id="register" class="reg-modal">
		<form class="reg-modal-content" action="homepage.php" method="post">
			<div class="regform-title">
				<span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h3>Register</h3>
			</div>
			<div class="regform-content">
				<div class="reg-contact-details">
					<div>
						<label><b>Name</b></label>
						<input type="text" placeholder="Name" name="name" id="name">
					</div>
					<div>
						<label><b>User Name</b></label>
						<input type="text" placeholder="For eg. xyz@123" name="user_name" id="user_name">
					</div>
				</div>
				<div class="reg-contact-details">
					<div>
						<label><b>Gender</b></label><br/>
						<select name="gender" id="gender" class="regform-content" name="gender">  
							<option value="male">Male</option>  
							<option value="female">Female</option>  
						</select>
					</div>
					<div>
						<label><b>Date Of Birth</b></label>
						<input type="date" placeholder="" id="dob" name="dob">
					</div>
				</div>
				<div class="reg-contact-details">
					<div>
						<label><b>Email</b></label>
						<input type="email" placeholder="Email" name="email" id="email">
					</div>
					<div>
						<label><b>Phone</b></label>
						<input type="text" placeholder="Phone" name="phone" id="phone">
					</div>
				</div>

				<div class="reg-contact-details">
					<div>
						<label><b>Password</b></label>
						<input type="password" placeholder="Password" name="password" id="password" required>
					</div>
					<div>
						<label><b>Confirm Password</b></label>
						<input type="password" placeholder="Confirm Password" name="cpassword" required>
					</div>
				</div>
				<br />
				<a href="#"><input type="submit" class="reg-btn" value="Signup" name="signup" id="signup"></a>
			</div>

		</form>
	</div>

	<!----- banner (homepage)------------------------------>
	<div class="banner">
		
		<div class="w3ls-slider">
			<div class="header-top">
				<div class="container banner-drop">
					<div class="agile-logo">
						<h1><a href="#">Goa's<span>SportsGoa</span></a></h1>
					</div>
					<div> </div>
					<div class="header-right">
							<nav>
							  <ul>
								<li class="active">
									<a href="homepage.php"><span>Home</span></a>
								</li>
								<li>
									<a href="#"><span>Calender</span></a>
								</li>

								<li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Goa University</a>
                                    <ul class="dropdown-menu">
										<li>
											<a href="user/tournaments.php?cat=<?php echo "cricket"; ?>&type=<?php echo "university"; ?>&id=<?php echo $_SESSION['uname'];?>"><span>Cricket</span>
											</a>
										</li>
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "football"; ?>&type=<?php echo "university"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Football</span></a>
	                                     </li>
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "volleyball"; ?>&type=<?php echo "university"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Volleyball</span></a>
	                                     </li>
	                                     <li>
                                     		<a href="user/tournaments.php?cat=<?php echo "hockey"; ?>&type=<?php echo "university"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Hockey</span></a>
                                     	</li>
                                     </ul>
                                </li>   
												
							    <li class="dropdown">
                                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Local</a>
                                     <ul class="dropdown-menu">
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "cricket"; ?>&type=<?php echo "local"; ?>&id=<?php echo $_SESSION['uname'];?>"><span>Cricket</span></a>
	                                     </li>
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "football"; ?>&type=<?php echo "local"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Football</span></a>
	                                     </li>
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "volleyball"; ?>&type=<?php echo "local"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Volleyball</span></a>
	                                     </li>
	                                     <li>
	                                     	<a href="user/tournaments.php?cat=<?php echo "hockey"; ?>&type=<?php echo "local"; ?>&id=<?php echo $_SESSION['uname'];?>"><span >Hockey</span></a>
	                                     </li>
                                     </ul>
                                 </li>

                        		<li>
								<a href="contact us/contact_us.php"><span>Contact Us</span></a>
								</li>
		
								<?php if (strlen($_SESSION['login']) == 0) { 
								?>
								<li>
									<a><span class="changecolor" onclick="document.getElementById('login').style.display='block'">Log in/Sign up</span></a>
								</li>
								<?php } else { ?>
									<?php 
										if($_SESSION['utype'] == "1")
											echo "
											<li class='dropdown'>
										<a class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp&nbsp;".$_SESSION['uname']."</span></a>
										<ul class='dropdown-menu'>
											<li><a href='user/sidebar.php'><span><i class='fa fa-address-card' aria-hidden='true'></i>&nbsp&nbsp;Edit Profile</span></a></li>
											<li><a href='logout.php'><span><i class='fa fa-sign-out' aria-hidden='true'></i>&nbsp&nbsp;Logout</span></a></li>
										</ul>
									</li>
											";
										else if($_SESSION['utype'] == "2")
											echo "
											<li class='dropdown'>
										<a class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp&nbsp;".$_SESSION['uname']."</span></a>
										<ul class='dropdown-menu'>
											<li><a href='user/sidebar.php'><span><i class='fa fa-address-card' aria-hidden='true'></i>&nbsp&nbsp;Edit Profile</span></a></li>
											<li><a href='subscriber/subscriber_homepage.php?id=".$_SESSION['username']."'><span><i class='fa fa-address-card' aria-hidden='true'></i>&nbsp&nbsp;Subscriber Homepage</span></a></li>
											<li><a href='logout.php'><span><i class='fa fa-sign-out' aria-hidden='true'></i>&nbsp&nbsp;Logout</span></a></li>
										</ul>
									</li>
											";
										else
										echo "
										<li class='dropdown'>
									<a class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user-circle' aria-hidden='true'></i>&nbsp&nbsp;".$_SESSION['uname']."</span></a>
									<ul class='dropdown-menu'>
										<li><a href='user/sidebar.php'><span><i class='fa fa-address-card' aria-hidden='true'></i>&nbsp&nbsp;Edit Profile</span></a></li>
										<li><a href='subuser/subuser_homepage.php?id=".$_SESSION['username']."'><span><i class='fa fa-address-card' aria-hidden='true'></i>&nbsp&nbsp;Sub-User Homepage</span></a></li>
										<li><a href='logout.php'><span><i class='fa fa-sign-out' aria-hidden='true'></i>&nbsp&nbsp;Logout</span></a></li>
									</ul>
								</li>
										";
									?>
										
									
								<?php
								} ?>

							  </ul>
							</nav>
							<div class="menu-icon"><span></span></div>
					</div>
					<div class="clearfix"> </div>
					<script>
						(function($){
						  $(".menu-icon").on("click", function(){
								$(this).toggleClass("open");
								$(".container").toggleClass("nav-open");
								$("nav ul li").toggleClass("animate");
						  });
						  
						})(jQuery);
					</script>

				</div>
			</div>
					<div class="page-header__content">
						<div class="text-bg">
							<svg>
								<defs>
									<mask id="mask" x="0" y="0" width="100%" height="100%">
										<rect id="alpha" x="0" y="0" width="100%" height="100%"/>
										<text id="title1" x="50%" y="35%" dy="1em" letter-spacing="0.02em">SportsGoa</text>
									</mask>
									<mask id="mask-2" x="0" y="0" width="100%" height="100%">
										<rect id="alpha-2" x="-66%" y="0" width="85%" height="100%" transform="skewX(40)"/>
										<text id="title2" x="50%" y="35%" dy="1em" letter-spacing="0.02em">SportsGoa</text>
									</mask>
									<mask id="mask-3" x="0" y="0" width="100%" height="100%">
										<rect id="alpha-3" x="-66%" y="0" width="70%" height="100%" transform="skewX(40)"/>
										<text id="title3" x="50%" y="35%" dy="1em" letter-spacing="0.02em">SportsGoa</text>
									</mask>
								</defs>
								<rect id="base" x="0" y="0" width="100%" height="100%" mask="url(#mask)"/>
								<rect id="base-3" x="0" y="0" width="100%" height="100%" mask="url(#mask-2)"/>
								<rect id="base-4" x="0" y="0" width="100%" height="100%" mask="url(#mask-3)"/>
								<text id="title4" x="50%" y="35%" dy="1em" letter-spacing="0.02em">SportsGoa</text>
							</svg>
						</div>
					</div>
				<div class="w3l-banner-grids">
					<div class="container">
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider4">
									<li>
										<div class="w3ls-text">
											<p>“Winning isn’t everything, it’s the only thing.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<p>“When you win, say nothing. When you lose, say less.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<p>“A champion is afraid of losing. Everyone else is afraid of winning.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<p>“Winning isn’t everything, but it beats anything that comes in second.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<p>“Losing feels worse than winning feels good.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<p>“You learn more from losing than winning. You learn how to keep going.”</p>
											<a href="#">About Us</a>
										</div>
									</li>
								</ul>
							</div>
							<script src="content/js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<!--banner Slider starts Here-->
						</div>
					</div>
				</div>
		</div>
		<div class="social-grids">
			<div class="container">
				<div class="agileinfo-social-grids">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php
		include("user/homepage_s_content.php");
	?>

	<?php
		include("footer.php");
	?>

</body>	
</html>