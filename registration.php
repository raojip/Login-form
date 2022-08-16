 
<?php
    require('db.php');

    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<div class="main-div">
    <div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq5QLodwWcigMeWN9AOUMj9sNXFD4MdrWqRndsth0ecA&s" alt="">
    </div>
    <form class="form" action="" method="post">
        <label>Username</label>
        <input type="text" class="login-input" name="username" required />
        <label>Email</label>
        <input type="text" class="login-input" name="email">
        <label>FirstName</label>
        <input type="text" class="login-input" name="firstname">
        <label>LastName</label>
        <input type="text" class="login-input" name="lastname">
        <label>Password</label>
        <input type="password" class="login-input" name="password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</div>
<?php
    }
?>
</body>
</html>
