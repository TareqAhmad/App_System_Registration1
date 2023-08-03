<?php

  include('config.php');



  $username = $_POST["username"];
  $email =  $_POST["email"];
  $password = $_POST["password"];
  $passwordR = $_POST["passwordR"];
 


  $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  $patternUserName = '/^[a-zA-Z0-9_]{8,}$/';

  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

  // check username is valid 
  if (!preg_match($patternUserName, $username)){

       $response = array("message" => "User Name is invalid.". $username . "");
    
  }else{
     // check email is existing in database  
          $query = "SELECT * FROM users WHERE email = '$email'";
          $result = mysqli_query($conn,$query);

         if ($result->num_rows > 0) {
    
              $response =  array("message" => "The email exists in the database.");
        
         }else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6 ){
             
                 $response = array("message" => "password don't strong.");

             } else if($password !== $passwordR){
                  
                       $response =  array("message" => "password don't match.");

                  }else  if ( preg_match($patternEmail, $email)){
  
                               $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                               $sql ="INSERT INTO users (username,email,passwordUser,status) VALUES ('$username','$email','$hashedPassword','inactive')";
                               if($conn->query($sql) === TRUE) {
                                       $response =  array("message" => "Registration successful.");
                               } else {
                                       $response = array("message" => "Error:" . $conn->error);
                               }
         
    
               }else {
                     $response = array("message" => "Invalid username or email or password.");
                }
          }
    
  header('Content-Type: application/json');
  echo json_encode($response);
?>

