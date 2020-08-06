<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Us</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">



   <style>
	    body{
	    	background-image: url(image/back2.jpg);
	    	background-size:cover;
	    }
	    hr{
	    	background: white;	
      height:2px;
	    }

		.contact-form{
			background:rgba(0,0,0, .6);
			color:white;
			margin-top: 80px;
			padding: 5px;
			box-shadow: 0px 0px 10px 3px grey;
		}
  .detail{
    
    padding:60px;

  }
   </style>


  </head>
<body>
	


<div class="container contact-form">
<form  method="POST" action="process.php">
	<h1>Contact Us</h1>
	<hr>

	<div class="row">
   
       <div class="col-md-6 detail">
       	<address>ADDRESS:- Goa University Taligao Panjim Goa.</address>
       	<p>EMAIL:- sportsgoa@gmail.com</p>
       	<p>PHONE No:-9922464496 </p>
       </div>

  
       <div class="col-md-6">
       	
         <div class="form-group">
         	<label>Name</label>
         	<input type="text" class="form-control" id="name" name="name" placeholder="enter your name" required>
         </div>

         <div class="form-group">
         	<label>Email</label>
         	<input type="email" class="form-control" id="email" name="email" placeholder="enter your email" required>
         </div>

         <div class="form-group">
         	<label>Message</label>
         	<textarea  class="form-control" rows="7" id="message" name="message" placeholder="enter your message" required> </textarea>
         </div>

         <div class="form-group">
         	<button type="submit" class="btn btn-primary btn-block">Send</button>
         </div>

       </div>
    </form>   
    </div>

</div>




</body>
</html>
