<?php
session_start();
include('../conn.inc.php');

//error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>	SportsGoa </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link href="../content/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="../content/css/style.css" type="text/css" media="all" />
	<!--// css -->
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../style.css" type="text/css" media="all" />

	<!-- font-awesome icons -->
	<link href="../content/css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- font -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- //font -->
	<script src="../content/js/jquery-1.11.1.min.js"></script>
	<script src="../content/js/bootstrap.js"></script>
	<script src="../content/js/SmoothScroll.min.js"></script>
	<script src="../content/js/jarallax.js"></script>
	<style type="text/css">
		.banner {
		    height: 116px;		
			}
	</style>
</head>
<body>

	<!------Login Form(Pop up)------>
	<?php

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$password = md5($_POST['password']);
		$sql = "SELECT * FROM users WHERE email=:email and password=:password";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			$_SESSION['login'] = $_POST['email'];
			foreach ($results as $result)
				$_SESSION['uname'] = $result->name;
			$currentpage = $_SERVER['REQUEST_URI'];
			//echo "<script>alert('Success');</script>";
			//echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
		} else {

			echo "<script>alert('Invalid Details');</script>";
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
				<input type="text" placeholder="Password" name="password" required>
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
			$email = $_POST['email'];
			$mobile = $_POST['phone'];
			//$password = md5($_POST['password']);
			$password = $_POST['password'];
			//$pass=mt_rand(1000,10000);
			//$password=md5($pass);
			$sql = "INSERT INTO  users(user_name,name,email,password) VALUES(:name,:name,:email,:password)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':name', $name, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
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
				<label><b>Name</b></label>
				<input type="text" placeholder="Name" name="name">

				<div class="reg-contact-details">
					<div>
						<label><b>Email</b></label>
						<input type="email" placeholder="Email" name="email">
					</div>
					<div>
						<label><b>Phone</b></label>
						<input type="text" placeholder="Phone" name="phone">
					</div>
				</div>

				<div class="reg-contact-details">
					<div>
						<label><b>Password</b></label>
						<input type="password" placeholder="Password" name="password" required>
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

	<!-- banner -->
	<div class="banner bg-about">
		<div class="header-top about-header-top" style="height: 116px;">
			<div class="container banner-drop">
				<div class="agile-logo">
					<h1><a href="../homepage.php">Goa's<span>sportsgoa</span></a></h1>
				</div>
				<div class="header-right">
						<nav>
						  <ul>
							<li>
							 <a href="../homepage.php"><span>Home</span></a>
							</li>
								
							<li>
                                <a href="#"><span>Calender</span></a>
                            </li>
                                	
							<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Goa University </a>
                                <ul class="dropdown-menu">
                             		<li>
										<a href="tournaments.php?cat=<?php echo "cricket"; ?>&type=<?php echo "university"; ?>"><span>Cricket</span>
										</a>
									</li>
                                     <li>
                                     	<a href="tournaments.php?cat=<?php echo "football"; ?>&type=<?php echo "university"; ?>"><span >Football</span></a>
                                     </li>
                                     <li>
                                     	<a href="tournaments.php?cat=<?php echo "volleyball"; ?>&type=<?php echo "university"; ?>"><span >Volleyball</span></a>
                                     </li>
                                     <li>
                                 		<a href="tournaments.php?cat=<?php echo "hockey"; ?>&type=<?php echo "university"; ?>"><span >Hockey</span></a>
                                 	</li>
                                 </ul>
                            </li>   
											
						    <li class="dropdown">
                                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Local</a>
                                 <ul class="dropdown-menu">
    	                             <li>
	                                 	<a href="tournaments.php?cat=<?php echo "cricket"; ?>&type=<?php echo "local"; ?>"><span>Cricket</span></a>
	                                 </li>
	                                 <li>
	                                 	<a href="tournaments.php?cat=<?php echo "football"; ?>&type=<?php echo "local"; ?>"><span >Football</span></a>
	                                 </li>
	                                 <li>
	                                 	<a href="tournaments.php?cat=<?php echo "volleyball"; ?>&type=<?php echo "local"; ?>"><span >Volleyball</span></a>
	                                 </li>
	                                 <li>
	                                 	<a href="tournaments.php?cat=<?php echo "hockey"; ?>&type=<?php echo "local"; ?>"><span >Hockey</span></a>
	                                 </li>
                                 </ul>
                             </li>
								
							<li >
						     <a href="#"><span>About Us</span></a>
							</li>
							<?php if (strlen($_SESSION['login']) == 0) { 
							?>
							<li>
								<a><spanj onclick="document.getElementById('login').style.display='block'">Log in</span></a>
							</li>
							<?php } else { ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp&nbsp;<?php echo $_SESSION['uname']; ?></span></a>
									<ul class="dropdown-menu">
										<li><a href="homepage.php"><span><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp&nbsp;Edit Profile</span></a></li>
										<li><a href="../logout.php"><span><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp&nbsp;Logout</span></a></li>
									</ul>
								</li>
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
		
</body>
</html>