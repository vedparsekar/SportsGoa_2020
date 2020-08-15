<?php   
 include 'conn.php'; // MySQL Connection
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $subuser_id2 = mysqli_real_escape_string($connect, $_POST["subuser_id2"]);  
      $password = mysqli_real_escape_string($connect, $_POST["password"]);  
      $name = mysqli_real_escape_string($connect, $_POST["subuser_name2"]);  
      $dob = mysqli_real_escape_string($connect, $_POST["dob"]);  
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $mobile = mysqli_real_escape_string($connect, $_POST["mobile"]);
      
      $event_id = mysqli_real_escape_string($connect, $_POST["event_id"]);
      $subscriber_id = mysqli_real_escape_string($connect, $_POST["subscriber_id"]);  
      $event_name = mysqli_real_escape_string($connect, $_POST["event_name"]);  
      $event_type= mysqli_real_escape_string($connect, $_POST["event_type"]);  
      $event_category = mysqli_real_escape_string($connect, $_POST["event_category"]);  
      $t_date = mysqli_real_escape_string($connect, $_POST["t_date"]);
      $t_time = mysqli_real_escape_string($connect, $_POST["t_time"]);  
      $place = mysqli_real_escape_string($connect, $_POST["place"]);
      $subuser_id = mysqli_real_escape_string($connect, $_POST["subuser_id"]);
      $description = mysqli_real_escape_string($connect, $_POST["description"]);  
      $rules = mysqli_real_escape_string($connect, $_POST["rules"]);
      
      $action = mysqli_real_escape_string($connect, $_POST["info"]);
      if($action == "update_event"){

        $query="UPDATE events SET subuser_id='".$subuser_id."' ,event_name='".$event_name."',event_type='".$event_type."',event_category='".$event_category."',place='".$place."',t_date='".$t_date."',t_time='".$t_time."',description ='".$description."',pic='".$userpic."' WHERE event_id='".$event_id."'";
      
         mysqli_query($connect, $query);
      
      }else if($action == "add_event")
      { 

      /*
      $imgFile = $_FILES['user_image']['name'];
      $tmp_dir = $_FILES['user_image']['tmp_name'];
      $imgSize = $_FILES['user_image']['size'];
    
      $upload_dir = 'user_images/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
      */

      $query = "INSERT INTO events (subuser_id,subscriber_id,event_name,event_type,event_category,place,t_date,t_time,description,pic,authenticate_status) VALUES ('$subuser_id','$subscriber_id','$event_name','$event_type','$event_category','$place','$t_date','$t_time','$description','','waiting')";
        
           $message = 'Added Record Successfully';  
           mysqli_query($connect, $query);  

      }else if($action == "subuser_update")
      {
         $query = "  
         UPDATE sub_users   
         SET password='$password',   
         name='$name',
         dob='$dob',   
         gender='$gender',   
         email = '$email',   
         mobile = '$mobile'   
         WHERE subuser_id='".$_POST["subuser_id2"]."'";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);      
      
      }else if($action == "add_fixture")
      {
        $t_time = mysqli_real_escape_string($connect, $_POST["t_time"]);  
        $place = mysqli_real_escape_string($connect, $_POST["place"]);
        $t_date = mysqli_real_escape_string($connect, $_POST["t_date"]);
        $team1 = mysqli_real_escape_string($connect, $_POST["team1"]);  
        $team2 = mysqli_real_escape_string($connect, $_POST["team2"]);
        $event_id = mysqli_real_escape_string($connect, $_POST["event_id"]);
        $query = "  
           INSERT INTO fixtures(event_id, team1, team2, place, t_date, t_time)  
           VALUES('$event_id', '$team1', '$team2', '$place', '$t_date', '$t_time');  
           ";  
           $message = 'Added Record Successfully';  
           mysqli_query($connect, $query);

      }else if($action == "update_fixture")
      {
        $t_time = mysqli_real_escape_string($connect, $_POST["t_time"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["match_id"]);  
        $place = mysqli_real_escape_string($connect, $_POST["place"]);
        $t_date = mysqli_real_escape_string($connect, $_POST["t_date"]);
        $team1 = mysqli_real_escape_string($connect, $_POST["team1"]);  
        $team2 = mysqli_real_escape_string($connect, $_POST["team2"]);
        $event_id = mysqli_real_escape_string($connect, $_POST["event_id"]);
        // $query = "  
        //    INSERT INTO fixtures(event_id, team1, team2, place, t_date, t_time)  
        //    VALUES('$event_id', '$team1', '$team2', '$place', '$t_date', '$t_time');  
        //    ";  
           $query = "  
         UPDATE fixtures   
         SET event_id='$event_id',   
         team1='$team1',
         team2='$team2',   
         place='$place',   
         t_date = '$t_date',   
         t_time = '$t_time'   
         WHERE match_id='".$_POST["match_id"]."'";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      }else if($action == "update_volleyball_result")
      { //-----------------
        $event_id = mysqli_real_escape_string($connect, $_POST["event_id"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["match_id"]);  
        $result_id = mysqli_real_escape_string($connect, $_POST["result_id"]);
        $team1_score = mysqli_real_escape_string($connect, $_POST["team1_score"]);
        $team2_score = mysqli_real_escape_string($connect, $_POST["team2_score"]);  
        $set1 = mysqli_real_escape_string($connect, $_POST["set1"]);
        $set2 = mysqli_real_escape_string($connect, $_POST["set2"]);
        $set3 = mysqli_real_escape_string($connect, $_POST["set3"]);
        $set4 = mysqli_real_escape_string($connect, $_POST["set4"]);
        $set5 = mysqli_real_escape_string($connect, $_POST["set5"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);
         
         $query = "  
         UPDATE results   
         SET event_id='$event_id',   
         match_id='$match_id',
         team1_score='$team1_score',
         team2_score='$team2_score',   
         set1='$set1',
         set2='$set2',
         set3='$set3',
         set4='$set4',
         set5='$set5',  
         description = '$description'    
         WHERE result_id='$result_id'";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      } else if($action == "update_football_result")
      { //-----------------
        $event_id = mysqli_real_escape_string($connect, $_POST["football_event_id"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["football_match_id"]);  
        $result_id = mysqli_real_escape_string($connect, $_POST["football_result_id"]);
        $team1_score = mysqli_real_escape_string($connect, $_POST["football_team1_score"]);
        $team2_score = mysqli_real_escape_string($connect, $_POST["football_team2_score"]);
        $description = mysqli_real_escape_string($connect, $_POST["football_description"]);
         
         $query = "  
         UPDATE results   
         SET event_id='$event_id',   
         match_id='$match_id',
         team1_score='$team1_score',
         team2_score='$team2_score',
         description = '$description'    
         WHERE result_id='$result_id'";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      }else if($action == "add_volleyball_result")
      { //-----------------
        $event_id = mysqli_real_escape_string($connect, $_POST["R_event_id"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["R_match_id"]);  
        $team1_score = mysqli_real_escape_string($connect, $_POST["team1_score"]);
        $team2_score = mysqli_real_escape_string($connect, $_POST["team2_score"]);  
        $set1 = mysqli_real_escape_string($connect, $_POST["set1"]);
        $set2 = mysqli_real_escape_string($connect, $_POST["set2"]);
        $set3 = mysqli_real_escape_string($connect, $_POST["set3"]);
        $set4 = mysqli_real_escape_string($connect, $_POST["set4"]);
        $set5 = mysqli_real_escape_string($connect, $_POST["set5"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);
         
         $query = " 
         INSERT INTO results (event_id, match_id, team1_score, team2_score,set1, set2, set3, set4, set5, description) VALUES ('$event_id', '$match_id', '$team1_score', '$team2_score', '$set1', '$set2', '$set3', '$set4', '$set5', '$description'); ";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      } else if($action == "add_football_result")
      { 
      //-----------------here//////////
        $event_id = mysqli_real_escape_string($connect, $_POST["Rf_event_id"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["Rf_match_id"]);  
        $team1_score = mysqli_real_escape_string($connect, $_POST["football_team1_score"]);
        $team2_score = mysqli_real_escape_string($connect, $_POST["football_team2_score"]);
        $description = mysqli_real_escape_string($connect, $_POST["football_description"]);
         
         $query = " 
         INSERT INTO results (event_id, match_id, team1_score, team2_score, description) VALUES ('$event_id', '$match_id', '$team1_score', '$team2_score', '$description'); ";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      }  else if($action == "add_news")
      {
        $time = mysqli_real_escape_string($connect, $_POST["time"]);  
        $place = mysqli_real_escape_string($connect, $_POST["place"]);
        $heading = mysqli_real_escape_string($connect, $_POST["heading"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);  
        $pic = mysqli_real_escape_string($connect, $_POST["pic"]);
        $date = mysqli_real_escape_string($connect, $_POST["date"]);
        $query = "  
           INSERT INTO news_articles(event_id, heading, description, date, time, place, pic)  
           VALUES('$event_id', '$heading', '$description', '$date', '$time', '$place', '$pic');  
           ";  
           $message = 'Added Record Successfully';  
           mysqli_query($connect, $query);

      } else if($action == "update_news")
      { //-----------------
        $event_id = mysqli_real_escape_string($connect, $_POST["event_id"]);  
        $news_id = mysqli_real_escape_string($connect, $_POST["news_id"]);  
        $heading = mysqli_real_escape_string($connect, $_POST["heading"]);
        $date = mysqli_real_escape_string($connect, $_POST["date"]);
        $time = mysqli_real_escape_string($connect, $_POST["time"]);
        $place = mysqli_real_escape_string($connect, $_POST["place"]);
        $pic = mysqli_real_escape_string($connect, $_POST["pic"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);
         
         $query = "  
         UPDATE news_articles   
         SET event_id='$event_id',
         heading='$heading',
         description='$description',
         date = '$date',
         place='$place',
         pic = '$pic'    
         WHERE news_id='$news_id'";  
         $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      }else if($action == "add_cricket_toss")
      { //-----------------toss details
        $event_id = mysqli_real_escape_string($connect, $_POST["toss_event_id"]);  
        $match_id = mysqli_real_escape_string($connect, $_POST["toss_match_id"]);  
        $team1 = mysqli_real_escape_string($connect, $_POST["toss_team1"]);
        $team2 = mysqli_real_escape_string($connect, $_POST["toss_team2"]);
        $toss_won = mysqli_real_escape_string($connect, $_POST["select_team"]);
        $choice = mysqli_real_escape_string($connect, $_POST["choose"]);
        
        if($toss_won=$team1)
        {

            if($choice=="bat")
            {
              $inning1_team=$team1;
              $inning2_team=$team2;
              $choice1="bat";
              $choice2="bowl";
              $toss_winner=$team1;
              $toss1="W";
              $toss2="L";
            }
            else
            {
              $inning1_team=$team2;
              $inning2_team=$team1;
              $choice1="bat";
              $choice2="bowl";
              $toss_winner=$team1;
              $toss1="L";
              $toss2="W";
            }

        }

      else
       {

            if($choice=="bat")
            {
              $inning1_team=$team2;
              $inning2_team=$team1;
              $choice1="bat";
              $choice2="bowl";
              $toss_winner=$team1;
              $toss1="W";
              $toss2="L";
            }
            else
            {
              $inning1_team=$team1;
              $inning2_team=$team2;
              $choice1="bat";
              $choice2="bowl";
              $toss_winner=$team1;
              $toss1="L";
              $toss2="W";
            }

       }

      $query = "INSERT INTO `livecricket` ( `event_id`,`match_id`,`team_name`,`toss`,`choice`,`inning`,`status`) VALUES ('$event_id' ,'$match_id' ,'$inning1_team' ,'$toss1' , '$choice1' , '1', '1') , ('$event_id' ,'$match_id' ,'$inning2_team' ,'$toss2' , '$choice2' , '2' , '0')"; 

        $message = 'Data Updated'; 
         mysqli_query($connect, $query);

      }  else{

        $query = "  
        INSERT INTO sub_users(subuser_id, password, name, dob, gender, email, mobile)  
        VALUES('$subuser_id2', '$password', '$name', '$dob', '$gender', '$email', '$mobile');  
        ";  
        $message = 'Added Record Successfully';  
        mysqli_query($connect, $query);
      }      
 }  

 ?>