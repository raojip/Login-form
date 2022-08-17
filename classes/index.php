<!DOCTYPE html>
<html lang="en">
<head>
  <title>title</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<?php

include_once "user.php";

$userobj = new User();

$success = "";
$error = "";

if (isset($_POST['submit'])) {
	$newdata['name'] = $_POST['name'];
	$newdata['email'] = $_POST['email'];
	$newdata['password'] = md5($_POST['password']);

	    if (!$userobj->isuserExist($newdata['email'])) {
	       if ($userobj->registration($newdata)) {
                 $success = "Your Registration Successfully Please login";
	       } else {
		  $error = "Registration failed please try again!";
	      }
	    } else {
	        $error = "Email already exists! Please try again.";
	    } 
}

?>

<body>
<?php
    if (!empty($error)) {
    echo  $error;
    } elseif (!empty($success)) {
    echo $success;
    }
?>
<div class="main-div">
    <div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq5QLodwWcigMeWN9AOUMj9sNXFD4MdrWqRndsth0ecA&s" alt="">
    </div>
    <form class="form" action="" method="post">
        <label>Username</label>
        <input type="text" class="login-input" name="name" required />
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
 </body>
</html>
