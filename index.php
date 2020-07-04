<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="loginpage.css">
<link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">

</head>

<body>
<?php
require('dp.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: fisrtpage.php");
         }else{
	echo "<div class='form'>
<p>Username/password is incorrect.
<br/>Click here to <a href='index.php'>Login</a></p></div>";
	}
    }else{
?>
<div class="container">
<img src="img/login.png">
	
	<form action="" method="post" name="login">
        
		<div class="user-input">
				<input type="text" name="username" placeholder="Username" required />
			</div> 
    
    
			<div class="form-input">
				<input type="password" name="password" placeholder="Password" required />
			</div>
		
    
            <input name="submit" type="submit" value="LOGIN" class="btn-login"/>

	</form>
	<p>Not Registered? <a href='registration.php'>Create an account</a></p>
</div>
<?php } ?>
</body>
</html>



		
		
	