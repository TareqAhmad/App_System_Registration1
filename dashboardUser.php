<?php
     session_start();
   include('config.php');
 
    $email = $_SESSION['email'];
   $result_First = $conn->query("SELECT id_user FROM users WHERE email ='$email'");
   $result = $conn->query("SELECT * FROM users WHERE email ='$email'");
   
   
   if($result_First->num_rows > 0){
        $row = $result_First->fetch_assoc();
        $id = $row['id_user']; 
   }  
   $result_Second = $conn->query("SELECT u.email, s.subject_name, i.mark, NULL AS default_mark FROM  subjects s JOIN  user_info_subject i ON s.id_subject = i.id_subject JOIN users u ON  u.id_user='$id'");


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Users</title>
    <!-- font google  -->
    <link href="" rel="stylesheet">

    <!-- link file bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- file main style sheet  -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
        
<div class="container d-grid ">

<aside class="aside bg-success p-4 d-flex flex-column align-items-center ">
  <h1 class="text-white mb-5">Welcome <?php  $email ?></h1>
  <ul>
 
     <li><a href="#"><i class="far fa-user"></i><span>profile</span></a></li>
     <li><a href="#"><i class="fas fa-graduation-cap"></i><span>courses</span></a></li>
     <li><a href="#"><i class="far fa-user-circle"></i><span>students</span></a></li>
     <li><a href="#"><i class="fas fa-cog"></i><span>settings</span></a></li>

 </ul>

</aside>
 <main class="main ">
     <header class="bg-success p-2">
         <h2 class="text-white">dashboard User</h2>
     </header>


     <div class="content">
         <h1>Data from MySQL</h1>
         <table class="table">
             <tr>
     
                <th>User Name</th>
                <th>Email</th>

            </tr>

            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found.</td></tr>";
        }
        ?>
         </table >

         <br class="border">

         <table class="table">
              <tr>
                <th>subject</th>
                <th>mark</th>
                <th>default mark</th>
             </tr>
             <?php
           if ($result_Second->num_rows > 0) {
            while ($row = $result_Second->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["subject_name"] . "</td>";
                echo "<td>" . $row["mark"] . "</td>";
                echo "<td>" . $row["default_mark"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found.</td></tr>";
        }
        ?>
         </table>
     </div>
     
 </main>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>