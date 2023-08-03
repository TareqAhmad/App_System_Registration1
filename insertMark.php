<?php 

   include('config.php'); 
 
  
 
      
       $student_id = $_POST["student_id"];
       $subject_id = $_POST["subject_id"];
       $mark_value = $_POST["mark_value"];


       $update ="UPDATE user_info_subject 
                 SET mark=$mark_value
                 WHERE id_user=$student_id AND id_subject =$subject_id"; 

        if($conn->query($update) === TRUE){
            $response = array("message" =>  " mark has been set for a subject and student successfully.");
          
       }else {
        $response = array("message" => "Error:".$conn->error);
         
    }
       


  header('Content-Type: application/json');
  echo json_encode($response);








?>