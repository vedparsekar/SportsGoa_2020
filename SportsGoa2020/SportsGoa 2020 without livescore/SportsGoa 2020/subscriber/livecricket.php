
<?php
    require("conn.php");
    $match_id= $_GET['match_id'];
   // $subscriber_id = $_GET['id'];

$query4="select * from fixtures where match_id='$match_id'";
$result4 = mysql_query($query4,  $connection) or die ("Error in query: ".$query. " ".mysql_error());
if (mysql_num_rows($result4) > 0) { 
while($row = mysql_fetch_array($result4))
 { 
    $event_id=$row['event_id'];
    $team1_name=$row['team1'];
    $team2_name=$row['team2'];
    $event_id=$row['event_id'];
    $match_id=$row['match_id'];
    $place=$row['place'];

}
}

    
    $query="select * from livecricket where match_id='$match_id' and status='1'";

    $result = mysql_query($query) or die ("Error in query: ".$query. " ".mysql_error());

  while($row = mysql_fetch_array($result))
   { 

      $runs=$row['runs'];
      $wickets=$row['wickets'];
      $overs=$row['overs'];
      $inning=$row['inning'];
      $status=$row['status'];
      $reg_id=$row['reg_id'];
  }

?>
<!doctype html>
<html lang="en">
  <head>
  	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../content/sidebar/css/style.css">
    <link rel="stylesheet" href="../content/multi_step/fonts/material-icon/css/material-design-iconic-font.min.css">  
    <link rel="stylesheet" href="../content/multi_step/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style type="text/css">

    #team123
    {
      margin-top:10px;
      margin-left:-260px; 
      width: 150px;
      border-radius:40px;
    }

      .ini{
        display: grid;
        grid-template-columns: 1fr;
        justify-items: center;
      }
    
    .dropdown
    {
      margin-left: 520px;
      margin-top: -210px;
    }
    .screen1
    {
      height:150px;
      width: 150px;
      text-align: center;
      font-size:70px;
      border-radius: 20px;

    }
    
    .nteam{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      margin-left: 20%;
      margin-right: 20%;
    }
    .screen12
    {
      height:120px;
      width: 120px;
      text-align: center;
      font-size:50px;
      border-radius: 20px;

    }
    .endm{
      background-color: #f13030;
      color: white;
      font-size: 15px;
      border-radius: 3px;
    }
    .ed{
      display: grid;
      grid-template-columns: 1fr;
      justify-items: center;
      margin-top: 5%;
        }

    .overscreen
    {
      height:120px;
      width: 120px;
      font-size:50px;
      border-radius: 20px;
    }

    
    #onebutton
    {
      height: 25px;
      width:  50px;
      border-style: none;
      border-radius: 4px;
      background-color: #4ef156;
      color: white;
    }
    #minusbutton
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #f13030;
      color: white;

    }
    .four
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #525cf0;
      color: white;
     
    }
    .six
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #525cf0;
      color: white;
    
    }
    #noball
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #b8b3b3;
      color: white;
    }
    
    #wideball
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #b8b3b3;
      color: white;
     
    }

    .wicket1
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #f13030;
      color: white;
      

    }
    .total
    {
      height: 25px;
      width:  50px;
      border-style: none;
      background-color: #4ef156;
      color: white;
      border-radius: 4px;

    }
    .overb
    {
      height: 25px;
      width:  50px;
      border-radius: 4px;
      border-style: none;
      background-color: #525cf0;
      color: white;
  
    }
    .sco{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      margin-left: 25%;
      margin-right: 25%;
      justify-items: center;
     
    }



  </style>

    <script type="text/javascript">

    var count = 0;
    function over(x)
    {
        var value = document.getElementById('overscreen').value;
       // console.log("value"+value);
        var res=value.split('.');
        if(res[1]=='5'){
          res[0] = parseInt(res[0],10) + 1;
          res[1] = '0';
        }
       else
       res[1] = res[1]*1 + 1;
       document.getElementById('overscreen').value=res[0]+'.'+res[1];
    }

    function four()
  {
    var value = parseInt(document.getElementById('team1').value);
    value = isNaN(value) ? 0 : value;
      value=value+4;
     document.getElementById('team1').value = value;
    } 

    function six()
  {
      var value = parseInt(document.getElementById('team1').value);
      value = isNaN(value) ? 0 : value;
      value=value+6;
     document.getElementById('team1').value = value;
    } 

    function pass()
  {
      var value = parseInt(document.getElementById('team1').value);
      value = isNaN(value) ? 0 : value;
      value++;
     document.getElementById('team1').value = value;
  }

    function rass(value)
  {
    if(document.getElementById("team1").value>=1)
    {
    document.getElementById("team1").value-=value;
    }
  }


    function wicket1()
  {
       var value = parseInt(document.getElementById('team12').value);
      value = isNaN(value) ? 0/* we are starting from zero */ : value;
      if(value<=9)
      {

      value++; 
     document.getElementById('team12').value = value;
    }
  }

    function total(value)
  {
    if(document.getElementById("team12").value>=1)
    {
    document.getElementById("team12").value-=value;
    }
  }

    function ps()
  {
      var value = parseInt(document.getElementById('team2').value);
      value = isNaN(value) ? 0 : value;
      value++;
     document.getElementById('team2').value = value;
  }
      function ss(val)
  {
    if(document.getElementById("team2").value>=1)
    {
    document.getElementById("team2").value-=val;
    }
  }

  </script>
  </head>
  <body style="font-family: Arial, Helvetica, sans-serif;">
		
    <?php
      include("header.php");
      $subscriber_id = $_SESSION['username'];
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
	  				<h4 style="font-size: 16px;"><?php echo $subscriber_id;?></h4>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="subscriber_homepage.php?id=<?php echo $subscriber_id;?>"><span class="fa fa-home mr-3"></span> Your Events</a>
          </li>
          <li>
            <a href="event_home.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subscriber_id;?>"><span class="fa fa-home mr-3"></span>Event Home</a>
          </li>
          <li>
            <a href="view_fixture.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subscriber_id;?>"><span class="fa fa-trophy mr-3"></span>View Fixture</a>
          </li>
          <li>
            <a href="view_result.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subscriber_id;?>"><span class="fa fa-trophy mr-3"></span> Result</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Livescore</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-gift mr-3"></span> News Article <span class="caret"></span></a>
            <ul class="list-unstyled components dropdownbut">
                <li class="active">
                    <a href="#"><span class="fa fa-car mr-3"></span> View News Article</a>
                </li>
                <li>
                  <a href="add_news.php?event_id=<?php echo $event_id; ?>&id=<?php echo $subscriber_id;?>"><span class="fa fa-car mr-3"></span> Add News Article</a>
                </li>
              </ul>
          </li>
        </ul>
    	</nav>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div style="color:black;">  
  <form> 
    <h3 style="text-align: center;">CRICKET</h3>
    <br>
    <div align="center">
      <input type="hidden" name="match_id" id="team123" value="<?php echo $match_id; ?>" ></input>
      <div class="nteam">
        <input type="text" name="" value="<?php echo $team1_name;?>"  readonly></input>
        <h6><b>V/S</b></h6>
        <input type="text" name="" value="<?php echo $team2_name;?>"  readonly></input>
      </div>
     <br>
      <div align="center">
        
      <?php
        if($inning>1)
        { 
          echo "<span  >";
          echo "<a href='previous_inning.php?rid=".$reg_id."&id=".$subscriber_id."'  style='background-color:#382eee; color:white; padding:3px;border-radius:4px; font-size:12px;'>FIRST INNING </a>  ";
          echo "</span>";
        }  
      ?>
      <?php
      if($inning<2)
      { echo "<span style='background:lightgrey;'>";
        echo "<a href='next_inning.php?rid=".$reg_id."&id=".$subscriber_id."'  style='background-color:#382eee; color:white; padding:3px;border-radius:4px; font-size:12px;'>SECOND INNING </a>";
        echo "</span>";
      }
     ?>
      <br/>
    <h3 style="text-transform: uppercase;">Inning:<?php echo $inning; ?>  </h3>
    <br/>
    
    </div>
  <br/>
    
    </div>
<div class="sco">

  <div>
   <p style="text-align: center;">SCORE</p>
    <input  class="screen1" type="text" name="screen1" id="team1" value="<?php echo $runs; ?>" readonly></input>
    <br>
    <button onclick="pass(this.value)"  id="onebutton" align="center" name="button">1 </button>
  <button onclick="rass(this.value)"  value="1" id="minusbutton" align="center" name="button">-1</button>
  <button onclick="four(this.value)" id="4" class="four" align="center" name="button">4</button>
  <button onclick="six(this.value)" id="6" class="six" align="center" name="button">6</button>
  <button onclick="pass(this.value)"  id="noball" align="center" name="button">NB</button>
  <button onclick="pass(this.value)"  id="wideball" align="center" name="button">WB</button>
    
  </div>

  <div>
  <p style="text-align: center;">WICKET</p>
    <input  class="screen12" type="text" name="screen12" id="team12" value="<?php echo $wickets ?>"  readonly></input>
    <button onclick="wicket1(this.value)" id="1" class="wicket1" name="button" >1</button>
  <button onclick="total(this.value)" id="1" value="1" class="total" name="button" >-1</button> 
  </div>

  <div>
  <p style="text-align: center;">OVER</p>
    <input  class="overscreen" type="text" name="overscreen" id="overscreen" value="<?php echo $overs ?>"  readonly></input>
    <button onclick="over(this.value)"  class="overb" value=1 name="button">1</button>
    </div>

</div>
  <br>
  
  

  
  
  
</form>
     <div class="ini">
    <?php

    $query11="select * from livecricket where match_id='$match_id'";

    $result11 = mysql_query($query11) or die ("Error in query: ".$query11. " ".mysql_error());

    while($row = mysql_fetch_array($result11))
     { 

        $runs=$row['runs'];
        $wickets=$row['wickets'];
        $overs=$row['overs'];
        $inning=$row['inning'];
      ?>
       
    Inning <?php echo $inning; ?> <input  class="set_no" type="text" name="inning"  value="<?php echo $runs; ?> / <?php echo $wickets; ?>" readonly></input> <?php echo $overs; ?> overs  <br/>

      <?php
    }
    
    ?> 
    </div>

      <div>
      <span class="ed">
        <a href="cricket_live_result.php?match_id=<?php echo $match_id; ?>&id=<?php echo $subscriber_id;?>" class="endm" >  END MATCH </a>
        </span>
        </div>
  </div>

    </div>      
  </div>

  <script src="../content/sidebar/js/jquery.min.js"></script>
  <script src="../content/sidebar/js/popper.js"></script>
  <script src="../content/sidebar/js/bootstrap.min.js"></script>
  <script src="../content/sidebar/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

  <?php
    include("../footer.php");
  ?>

</body>
</html> 

<?php 

if (isset($_GET['button']))
{
    $runs=$_GET['screen1'];
    $wickets=$_GET['screen12'];
    $overs=$_GET['overscreen'];
    $match_id=$_GET['match_id'];
    //echo $team1; echo "<br/><br/>";
    //echo $team2; echo "<br/><br/>";
    //echo $match_id; echo "<br/><br/>";
    
    $query8="update livecricket set runs='".$runs."' , wickets='".$wickets."' , overs='".$overs."' where match_id='$match_id' and status='1'";
    $query8;

    if ($res8=mysql_query($query8)) 
    {
        header("location:livecricket.php?match_id="+$match_id);

    }
    else
    {
        echo "data not inserted";
        header("location:livecricket.php?match_id="+$match_id);
    }
}  

?>