<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

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
  
 <!-- container section starts  -->
   
     <div class="container d-grid w-100">
         <aside class="bg-success p-4 d-flex flex-column align-items-center justify-content-center">
              <h1 class="text-white mb-5">Welcome</h1>
              <p class="text-white mb-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, praesentium!
              </p>

              <button class="btn btn-secondary" ><a href="login.php" class="text-white text-decoration-none">sign in</a></button>
         </aside>
         <main class="main mx-auto">
             <div class="card mt-3">
                <div class="card-header">
                    <h4 class="text-center">create account</h4>
                    <div class="social  text-center">
                        <i class="me-2 fab fa-facebook fa-lg"></i>
                        <i class="me-2 fab fa-google-plus-g fa-lg"></i>
                        <i class="me-2 fab fa-linkedin-in fa-lg"></i>
                    </div>
                    <span class="text-muted">Lorem ipsum dolor sit amet consectetur.</span>
                </div>
                <div class="card-body">
                  <form id="sign" class="m-3 p-3  w-100" action="" method="POST">
                    <div class="mb-3">
                        <label for="">username</label>
                        <input type="text"  name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">email</label>
                        <input type="email"  name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Repeat Password</label>
                        <input type="password" name="passwordR" id="passwordR" class="form-control">
                    </div>
                    <div class="mb-3">
                    <button name="registration" type="submit"  class="btn btn-success">Create Account</button
                    </div>
                  </form>
                  <div id="result" class="text-center text-weight-bold mt-3"></div>
                </div>

             </div>
         </main>
    </div>
     </div>
     <!-- container section ends  -->





    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script src="js/main.js"></script>

</body>
</html>



