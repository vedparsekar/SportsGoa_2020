<!doctype html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../content/sidebar/css/style.css">
  <link rel="stylesheet" href="style.css" type="text/css" media="all" />

</head>

<body>

  <?php
  include("header.php");
  ?>

  <?php
  $email = $_SESSION['login'];
  $sql = "SELECT * FROM users WHERE email=:email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
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
          <h4 style="font-size: 16px;">
            <?php
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                  echo htmlentities($result->name);
                  //echo $_SESSION['login'];
            ?> 
          </h4>
        </div>
      </div>
      <ul class="list-unstyled components mb-5">
        <li class="active">
          <a href="sidebar.php"><span class="fa fa-home mr-3"></span>Profile</a>
        </li>
        <li>
          <a href="setting.php"><span class="fa fa-cog mr-3"></span>Setting</a>
        </li>
        <li>
          <a href="../logout.php"><span class="fa fa-gift mr-3"></span>Logout</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <h2 class="mb-4">Profile</h2>
      <div id="register" class="reg-modal">
        <h1>hello</h1>
		<form class="reg-modal-content" action="homepage.php" method="post">
			<div class="regform-title">
				<span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
<!-- 				<h3></h3>
 -->			</div>
			<div class="regform-content">
      <div class="img"><img src="../content/sidebar/images/logo.jpg" style="height: 15em;"/></div>
				<label><h3>Username:<?php echo htmlentities($result->user_name); ?></h3></label>
				<div class="reg-contact-details">
					<div>
						<label><h3>Name:<?php echo htmlentities($result->name); ?></h3></label>
					</div>
					<div>
						<label><h3>Email:<?php echo htmlentities($result->email); }}?></h3></label>
					</div>
				</div>
			</div>

		</form>
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