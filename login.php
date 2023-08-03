<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
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
    <div class="container d-grid">

         <aside class="aside bg-success p-4 d-flex flex-column align-items-center justify-content-center">
              <h1 class="text-white mb-5">Welcome</h1>
              <p class="text-white mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, praesentium!
              </p>
              <button class="btn btn-secondary" ><a href="index.php" class="text-white text-decoration-none" >sign up</a></button>
         </aside>
         <main class="main mx-auto p-5">
             <?php include("messagelogin.php"); ?>
             <div class="card">
                <div class="card-header text-center">
                   <h4 class="text-center">login </h4>
                   <div class="social p-2 text-center">
                        <i class="me-2 fab fa-facebook fa-lg"></i>
                        <i class="me-2 fab fa-google-plus-g fa-lg"></i>
                        <i class="me-2 fab fa-linkedin-in fa-lg"></i>
                  </div>
                  <span class="text-muted ">Lorem ipsum dolor sit amet consectetur,</span>
                </div> 
                <div class="card-body">
                    <form  class="m-3 p-3  w-100" action="checkLogin.php" method="POST">
                        <div class="mb-3">
                              <label for="">email</label>
                              <input  type="email" name="email" id="email" class="form-control" required />
                        </div>
                        <div class="mb-3">
                              <label for="">email</label>
                              <input  type="password" name="password" id="password"  class="form-control" required />
                        </div>
                        <div class="mb-3">
                              <button type="submit" name="login" id="login" class="btn btn-success">login</button
                        </div>
                    </form>
                    <div id="resultLogin" class="text-center text-weight-bold mt-3"></div>


                </div> 

            </div>
            
                 
        
       
         </main>
    </div>

     <!-- container section ends  -->





    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>


</body>
</html>