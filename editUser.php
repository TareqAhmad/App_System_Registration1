<?php 

 include("config.php");



 if(isset($_POST['checking_edit_btn'])){
    $id = $_POST['studentID'];

     $result_array = [];

   $query ="SELECT * FROM users WHERE id_user ='$id'"; 
   $query_run = mysqli_query($conn,$query);


   if($query_run->num_rows > 0){
         foreach($query_run as $row){
             
            array_push($result_array,$row);
            header('Content-Type: application/json');
             echo json_encode($result_array);
         }
   }

 }



?>