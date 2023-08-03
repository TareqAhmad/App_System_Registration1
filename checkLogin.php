<?php
   
   session_start();
   include("config.php"); 
 

    if(isset($_POST["login"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql ="SELECT id_user,username,email,passwordUser,status FROM users WHERE email ='$email'";
        $result_sql = $conn->query($sql);

        if($result_sql->num_rows == 1){

            $row = $result_sql->fetch_assoc();
            $id = $row['id_user']; 
            
            if($id == 1){

                $_SESSION['id_user'] = $row['id_user'];
                header("Location: dashboard.php");
                exit();
            }else {
                $hashed_password = $row['passwordUser'];
            if(password_verify($password,$hashed_password)){
                 $status = $row['status'];
                 if ($status === "inactive"){
                     $_SESSION['message'] ="This account is inactive, please wait for the administrator to active your account";
                     header("Location: login.php");
                     exit(0);
                 }else{
                    
                     $_SESSION['email'] = $row['email'];
                     header("Location: dashboardUser.php");
                     exit();
                    }
                }

            }

        }
        
    }

   
  
?>