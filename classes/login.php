<!DOCTYPE html>
<html lang="en">
<head>
  <title>title</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<?php  
  
  include_once "user.php";

  if(isset($_SESSION['id'])) {
      header("Location:home.php");
  }

  $userobj = new User();
  
  $success = "";
  $error = "";

  if (isset($_POST['submit'])) {
      $newdata['email'] = $_POST['email'];
      $newdata['password'] = $_POST['password'];
      
      if ($userobj->login($newdata)) {
          if (!isset($_SESSION['id'])) {
              header("Location:index.php");
          } else {  
              header("Location:home.php");
          }
      }else{
          $error = "Incorrect Email or Password";
      }
    }
?>

<body class="hold-transition login-page">
<div>
    <div class="login-div ">
    <div class="bsf-icon">
        <img class="bsf-icon" src="https://store.brainstormforce.com/wp-content/uploads/2019/03/BSF_logo_r-1.svg" class="custom-logo astra-logo-svg" alt="Brainstorm Force – Store" >
    </div>
    </div>
<div class="login">
 <h1 class="login-title">Login</h1>
    <form class="login-form" method="post" name="login">
        <h3 class="account-holder">Login Into Your account</h3>   
        <label>Email</label>
        <input type="text" class="login-input-form" name="email" autofocus="true"/> <br>
        <label>Password</label><br>
        <input type="password" class="login-input-form" name="password"/>
        <input type="submit" value="Login" name="submit" class="login-btn"/>
        <p class="link">Don't have an account? <a href="index.php">Registration Now</a></p>
    </form>
</div>
</div>
  </body>
</html>