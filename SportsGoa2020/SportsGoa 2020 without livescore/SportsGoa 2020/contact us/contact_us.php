<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Us</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <style>
	    .form-container{
	    	background-image: url(../content/world/img/match/match-bg.jpg);
	    	background-size:cover;
			margin-top: 10px;
	    }
	   
		.contact-form{
			background:rgba(0,0,0, .6);
			color:white;
			margin-top: 80px;
			padding: 5px;
			
		}
  		.detail{
   			 padding:60px;
  		}
  		.contact1{
	  		background-color: #e20d0d;
			padding: 8px;
		  text-align: center;
  		}
  		.bt{
			background-color: #e20d0d;
			color: white;
  		}
   </style>


  </head>
<body>
<?php 
	include("../user/header.php");
?>
<div class="form-container">
<br>
<div class="container contact-form">
<form  method="POST" action="process.php">
	<div class="contact1">
		<h2>Contact Us</h2>
	</div>
	<br>
	<div class="row">
       <div class="col-md-6 detail">
       	<address>ADDRESS:- Goa University Taligao Panjim Goa.</address>
       	<p>EMAIL:- sportsgoa@gmail.com</p>
       	<p>PHONE No:-9922464496 </p>
       </div>

       <div class="col-md-6">
         <div class="form-group">
         	<label>Name</label>
         	<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
         </div>

         <div class="form-group">
         	<label>Email</label>
         	<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
         </div>

         <div class="form-group">
         	<label>Message</label>
         	<textarea  class="form-control" rows="7" id="message" name="message" placeholder="enter your message" required> </textarea>
         </div>

         <div class="form-group">
         	<button type="submit" class="btn btn-block bt">Send</button>
         </div>

	   </div>
	</div>
    </form>   
	</div>
	<br>
</div>
<?php
	include("../footer.php");
	?>
</body>
</html>
