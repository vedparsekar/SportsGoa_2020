<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">

		.score{
			float:center;
			background-image: url("../content/world/img/match/match-bg.jpg"),
			linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2));
    		background-blend-mode: overlay;
			
		}
		.end{
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			padding:5%;
		}
		.ed{
			background-color: #f81f29;
			color: white;
			padding: 5px;
			border-radius: 5px;
		}
		.scr {
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-gap: 1em;
		}
		.s1{
			float:left;
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			grid-gap: 1em;
		}
		
		.match{
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			padding:1%;
			background-color: #f81f29;
			color: white;
		}
		
		.s2{
			float:right;
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
			grid-gap: 1em;
		}


        .screen1,.wicket1
		{
			height:100px;
			width: 100px;
			float:left;
			text-align: center;
			font-size:35px;
			border-style:none;
            border-radius: 20px;

		}
		.screen2,.wicket2
		{
			height:100px;
			width: 100px;
			float:right;
			text-align: center;
			font-size:35px;
			border-style:none;
            border-radius: 20px;
		}
		#onebutton
		{
			height: 40px;
			width:  40px;	
			background-color: #1fc90f;
			color: white;
			border-style: none;
			border-radius: 5px;
		}
		#minusbutton
		{
			height: 40px;
			width:  40px;
			background-color: #f81f29;
			color: white;
			border-style: none;
			border-radius: 5px;
		}
		.twobutton
		{
			height: 40px;
			width:  40px;	
			background-color: #1fc90f;
			color: white;
			border-style: none;
			border-radius: 5px;
		}
		.minusbutton2
		{
			height: 40px;
			width:  40px;
			background-color: #f81f29;
			color: white;
			border-style: none;
			border-radius: 5px;
		}

        .sixbutton{
			background-color: #203ddf;
		}
		.wicket{
			background-color: #f81f29;
		}
		.fourbutton{
			background-color: #203ddf;
		}

		.fourbutton,.sixbutton,.wicket{
			height: 40px;
			width:  40px;
			color: white;
			border-style: none;
			border-radius: 5px;

		}
		.teamname{
			border-style: none;
			text-transform: uppercase;
			font-weight: bold; 
			text-align: center;
		}
        .score-overs{
			display: grid;
			grid-template-columns: 1fr;
			justify-items: center;
		}
	</style>
</head>
<body>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#lfootball">Football</button>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#lcricket">Cricket</button>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#lhockey">Hockey</button>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#lvollyball">Vollyball</button>

  <!-- Modal Football -->
  <div class="modal fade" id="lfootball" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="score">
	<form method="GET">
		<h3 class="match">FOOTBALL</h3>
		<input type="hidden" name="match_id" id="team123" value="" ></input><br/>
		<div class="scr">
		<div class="s1">
			<div>
				<input class="teamname" type="text" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen1" type="text" name="screen1" id="team1" value="" readonly></input>
			</div>
			<div>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
	
		<div class="s2">
			<div>
				<input type="text" class="teamname" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen2" type="text" name="screen2" id="team2" value="" readonly></input>
			</div>
			<div>
				<button onclick="ps(this.value)" value="1" class="twobutton" name="button" align="center">+1</button>
				<button onclick="ss(this.value)" value="1" class="minusbutton2" name="button" align="center">-1</button>
			</div>
		</div>
		</div>
	</form>	
	<div class="end">
        <a href="football_live_result.php?id=<?php //echo $match_id; ?>" class="ed">  END MATCH </a>
	</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>



   <!-- Modal Football -->
   <div class="modal fade" id="lhockey" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="score">
	<form method="GET">
		<h3 class="match">HOCKEY</h3>
		<input type="hidden" name="match_id" id="team123" value="" ></input><br/>
		<div class="scr">
		<div class="s1">
			<div>
				<input class="teamname" type="text" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen1" type="text" name="screen1" id="team1" value="" readonly></input>
			</div>
			<div>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
	
		<div class="s2">
			<div>
				<input type="text" class="teamname" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen2" type="text" name="screen2" id="team2" value="" readonly></input>
			</div>
			<div>
				<button onclick="ps(this.value)" value="1" class="twobutton" name="button" align="center">+1</button>
				<button onclick="ss(this.value)" value="1" class="minusbutton2" name="button" align="center">-1</button>
			</div>
		</div>
		</div>
	</form>	
	<div class="end">
        <a href="football_live_result.php?id=<?php //echo $match_id; ?>" class="ed">  END MATCH </a>
	</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>


 <!-- Modal Vollyball -->
 <div class="modal fade" id="lvollyball" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="score">
	<form method="GET">
		<h3 class="match">Vollyball</h3>
		<input type="hidden" name="match_id" id="team123" value="" ></input><br/>
		<div class="scr">
		<div class="s1">
			<div>
				<input class="teamname" type="text" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen1" type="text" name="screen1" id="team1" value="" readonly></input>
			</div>
			<div>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
	
		<div class="s2">
			<div>
				<input type="text" class="teamname" name="" value=""  readonly></input>
			</div>
			<div>
				<input  class="screen2" type="text" name="screen2" id="team2" value="" readonly></input>
			</div>
			<div>
				<button onclick="ps(this.value)" value="1" class="twobutton" name="button" align="center">+1</button>
				<button onclick="ss(this.value)" value="1" class="minusbutton2" name="button" align="center">-1</button>
			</div>
		</div>
		</div>
	</form>	
	<div class="end">
        <a href="football_live_result.php?id=<?php //echo $match_id; ?>" class="ed">  END MATCH </a>
	</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>

                                            <!--cricket-->

  <div class="modal fade" id="lcricket" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="score">
	<form method="GET">
		<h3 class="match">CRICKET</h3>
		<input type="hidden" name="match_id" id="team123" value="<?php //echo $match_id; ?>" ></input><br/>
		<div class="scr">
		<div class="s1">
			<div>
				<input class="teamname" type="text" name="" value="<?php //echo $team1_name;?>"  readonly></input>
			</div>
			<div class="score-overs">
				<input  class="screen1" type="text" name="screen1" id="team1" value="<?php //echo $team1;?>123/3" readonly></input>
				<!--<input  class="wicket1" type="text" name="screen2" id="team2" value="<?php// echo $team2;?>" readonly></input>-->
				<h2 style="color: white">24.5</h2>
			</div>
			<div>
				<p style="color: white">RUNS:</p>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
				<button onclick="ps(this.value)" value="1" class="sixbutton" name="button" align="center">6</button>
				<button onclick="ss(this.value)" value="1" class="fourbutton" name="button" align="center">4</button>
				<button onclick="ss(this.value)" value="1" class="wicket" name="button" align="center">W</button>
			</div>
			<div>
			<p style="color: white">OVERS:</p>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
	
		<div class="s2">
			<div>
				<input class="teamname" type="text" name="" value="<?php //echo $team2_name;?>"  readonly></input>
			</div>
			<div class="score-overs">
				<!--<input  class="screen2" type="text" name="screen2" id="team2" value="<?php //echo $team2;?>9" readonly></input>-->
				<input  class="wicket2" type="text" name="screen2" id="team2" value="<?php //echo $team2;?>200/9" readonly></input>
				<h2 style="color: white">49.8</h2>
			</div>
			<div>
			<p style="color: white">RUNS:</p>
				<button onclick="ps(this.value)" value="1" class="twobutton" name="button" align="center">+1</button>
				<button onclick="ss(this.value)" value="1" class="minusbutton2" name="button" align="center">-1</button>
				<button onclick="ps(this.value)" value="6" class="sixbutton" name="button" align="center">6</button>
				<button onclick="ss(this.value)" value="4" class="fourbutton" name="button" align="center">4</button>
				<button onclick="ss(this.value)" value="1" class="wicket" name="button" align="center">W</button>
			</div>
			<div>
			<p style="color: white;">OVERS:</p>
				<button onclick="pass(this.value)" value="1" id="onebutton" name="button" align="center">+1</button>
				<button onclick="rass(this.value)" value="1"  id="minusbutton" name="button" align="center">-1</button>
			</div>
		</div>
		</div>
	</form>	
	<div class="end">
	<a href="cricket_live_result.php?id=<?php //echo $match_id; ?>" class="ed">  END MATCH </a>
	</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div>
  

</div>

</body>
</html>
