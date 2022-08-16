<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die("error");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
    
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
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
    <label>Username or Email</label>
        <input type="text" class="login-input-form" name="username" autofocus="true"/> <br>
        <label>Password</label><br>
        <input type="password" class="login-input-form" name="password"/>
        <input type="submit" value="Login" name="submit" class="login-btn"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
    </form>
</div>
</div>
</body>
</html>

<?php
    }
?>
