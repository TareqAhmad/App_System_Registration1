<?php 

   include('config.php');

   $student_value = $_POST["student_value"]; 
   $subject_value = $_POST["subject_value"];
    
     

   $query = "SELECT id_user,id_subject FROM user_info_subject WHERE id_user='$student_value' AND id_subject ='$subject_value'"; 
   $query_run = mysqli_query($conn,$query); 
   
   if(mysqli_num_rows($query_run)>0){

    $response = array("message" => "A subject has been previously assigned to the student.");
   }else {
    //insert data into database
    $insert =$conn->prepare("INSERT INTO user_info_subject (id_user, id_subject, mark) SELECT u.id_user, s.id_subject, '0' FROM users u, subjects s   WHERE u.id_user ='$student_value' AND s.id_subject='$subject_value'");
    $insert->execute();
   if($insert->execute() === TRUE ) {
        $response =  array("message" => "assign subject successful.");
   }else {
        $response = array("message" => "Error:" . $conn->error);
   }
   }

   header('Content-Type: application/json');
   echo json_encode($response);








?>