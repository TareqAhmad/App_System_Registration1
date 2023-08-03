<?php 

 include("config.php");

      

   if(isset($_POST['btn_delete_OK'])){
      
      $id = $_POST['student_Id'];

        $query ="DELETE FROM users WHERE  id_user ='$id'"; 
        $query_run = mysqli_query($conn,$query);

        if($conn->query($query) === TRUE) {
           
          $response = array("message" =>  "deleted student successful.");
         
        } else {
          $response =array("message"=> "Error:" . $conn->error);
         
        }
  }

  header('Content-Type: application/json');
  echo json_encode($response);
 
  
   
 



?>