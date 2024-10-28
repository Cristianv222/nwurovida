<?php
session_start();
error_reporting(0);
include('includes/config.php');

if ($_SESSION['alogin'] != '') {
   $_SESSION['alogin'] = '';
}

if (isset($_POST['login'])) {
   $uname = $_POST['username'];
   $password = md5($_POST['password']);
   $sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
   $query = $dbh->prepare($sql);
   $query->bindParam(':uname', $uname, PDO::PARAM_STR);
   $query->bindParam(':password', $password, PDO::PARAM_STR);
   $query->execute();
   $results = $query->fetchAll(PDO::FETCH_OBJ);
   if ($query->rowCount() > 0) {
      $_SESSION['alogin'] = $_POST['username'];
      echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
   } else {
      echo "<script>alert('Invalid Details');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Acceso Admin</title>
   <link rel="icon" type="image/x-icon" href="../neuro/images/logo_neuro.jpg">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
   <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
   <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen">
   <link rel="stylesheet" href="assets/css/prism/prism.css" media="screen">
   <link rel="stylesheet" href="styles.css"> <!-- El CSS actualizado -->
   <script src="assets/js/modernizr/modernizr.min.js"></script>
</head>
<style>
   @keyframes fadeIn {
      0% {
         opacity: 0;
         transform: translateY(-20px);
      }

      100% {
         opacity: 1;
         transform: translateY(0);
      }
   }

   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
   }

   body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
   }

   .login-container {
      display: flex;
      width: 900px;
      height: 500px;
      background-color: white;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
   }

   .login-left {
      width: 50%;
      background-color: #e9f1f7;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
   }

   .background-pattern {
      background-image: url(../neuro/images/vecteezy_vector-technology-concept-connected-lines-and-dots-network_15258828.jpg);
      background-size: cover;
      background-position: center;
      height: 100%;
      width: 100%;
   }

   .login-right {
      width: 50%;
      padding: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: fadeIn 1s ease-out;
   }

   .login-form {
      width: 100%;
      max-width: 350px;
   }

   h5,
   h1 {
      font-size: 24px;
      color: #4d626f;
      margin-bottom: 20px;
   }

   .input-group {
      margin-bottom: 20px;
   }

   label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #4d626f;
   }

   input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
   }

   .show-password {
      position: absolute;
      right: 10px;
      top: 35px;
      cursor: pointer;
      color: #777;
   }

   .btn-login {
      width: 100%;
      background-color: #4d626f;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
   }

   .btn-login:hover {
      background-color: #354c57;
   }
</style>

<body>
   <div class="login-container">
      <div class="login-left">
         <div class="background-pattern"></div>
      </div>

      <div class="login-right">
         <div class="login-form">
            <div class="logo text-center">
               <a href="#"><img style="height: 70px" src="assets/images/footer-logo.png" alt="Logo"></a>
               <h5 style="color: #4d626f;"> <strong>Bienvenido Neurovida</strong></h5>
            </div>

            <form method="post">
               <div class="input-group">
                  <label for="inputEmail3">Correo</label>
                  <input type="text" name="username" id="inputEmail3" class="form-control" placeholder="Correo" required>
               </div>

               <div class="input-group">
                  <label for="inputPassword3">Contraseña</label>
                  <input type="password" name="password" id="inputPassword3" class="form-control" placeholder="Contraseña" required>
                  <span class="show-password" onclick="togglePassword()">Mostrar</span>
               </div>

               <div class="form-group mt-20">
                  <button type="submit" name="login" class="btn login-btn">Acceder</button>
                  <button type="button" onclick="window.location.href='../index.php'" class="btn login-btn">Volver</button>


               </div>

            </form>
            

         </div>
      </div>
   </div>

   <script>
      function togglePassword() {
         var passwordField = document.getElementById("inputPassword3");
         if (passwordField.type === "password") {
            passwordField.type = "text";
         } else {
            passwordField.type = "password";
         }
      }
   </script>

   <!-- Scripts comunes -->
   <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
   <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/js/bootstrap/bootstrap.min.js"></script>
   <script src="assets/js/pace/pace.min.js"></script>
   <script src="assets/js/lobipanel/lobipanel.min.js"></script>
   <script src="assets/js/iscroll/iscroll.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>