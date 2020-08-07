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

      $query = "INSERT INTO events (subuser_id,subscriber_id,event_name,event_type,event_category,place,t_date,t_time,description,pic,authenticate_status) VALUES ('$subuser_id','$subscriber_id','$event_name','$event_type','$event_category','$place','$t_date','$t_time','$description','aaa','waiting')";
        
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
      
      }else if($action == "add_news")
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

      } else{

           $query = "  
           INSERT INTO sub_users(subuser_id, password, name, dob, gender, email, mobile)  
           VALUES('$subuser_id2', '$password', '$name', '$dob', '$gender', '$email', '$mobile');  
           ";  
           $message = 'Added Record Successfully';  
           mysqli_query($connect, $query);
      }      
 }  

 ?>