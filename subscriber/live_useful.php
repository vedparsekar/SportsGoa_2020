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
				<input type="text" value="" name="toss_event_id" id="toss_event_id" hidden/>
				<input type="text" value="" name="toss_match_id" id="toss_match_id" hidden />
				<div class="scr">
					<div class="s1">
						<div>
							<input class="teamname" type="text" name="football_team1" id="football_team1" value=""  readonly></input>
						</div>
						<div>
							<input  class="screen1" type="text" name="team1_score" id="team1_score" value="" readonly></input>
						</div>
						<div>
							<button onclick="team1_add1(this.value)" value="0" id="onebutton" name="button" align="center">+1</button>
							<button onclick="team1_sub1(this.value)" value="0"  id="minusbutton" name="button" align="center">-1</button>
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
							<button onclick="team2_add1(this.value)" value="0" class="twobutton" name="button" align="center">+1</button>
							<button onclick="team2_sub1(this.value)" value="0" class="minusbutton2" name="button" align="center">-1</button>
						</div>
					</div>
					</div>
					</form>	
					<div class="end">
						<input type="text" value="football_livescore" name="info" id="info" hidden>
				        <a href="#" class="ed" id="submit">  END MATCH </a>
					</div>
				</div>
			        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div> 
		    </div>
		  </div>
