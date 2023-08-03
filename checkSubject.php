<?php

  include('config.php');

  $subject_name = $_POST["subject_name"];
  $default_mark=  $_POST["default_mark"];

  if(!empty($subject_name) && !empty($default_mark)){
    
    $query = "SELECT * FROM subjects WHERE subject_name ='$subject_name'"; 
    $result = mysqli_query($conn,$query);

    if ($result->num_rows > 0) {
       $response = array("message" => "subject exist in database.");
    }else {  
      $insert = "INSERT INTO subjects (subject_name, default_mark) VALUES ('$subject_name','$default_mark')";
      if($conn->query($insert) === TRUE) {
        $response =  array("message" => "add subject successful.");
      } else {
        $response = array("message" => "Error:" . $conn->error);
      }
    } 
      }else {
     $response = array("message"=>"values to subject or default_mark is empty"); 
  }


  

  header('Content-Type: application/json');
  echo json_encode($response);
?>

