<?php 

 include('config.php'); 


   $email = $_POST['email']; 
   $status = $_POST['status']; 


    $update_query = "UPDATE users SET status = '$status' WHERE email ='$email'"; 
    $result =   mysqli_query($conn,$update_query);

    if($conn->query($update_query) === TRUE) {
        $response =  array("message" => "update student successful.");
    } else {
        $response = array("message" => "Error:" . $conn->error);
    }
    header('Content-Type: application/json');
    echo json_encode($response);

?>