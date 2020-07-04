<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
	<link rel="stylesheet" href="registration.css">
	<link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">

</head>

    

	<div id="main-wrapper">
		<center><h2> Registration  Form</h2> 
		</center>
<?php
require('dp.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<p>You are registered successfully.
<br/>Click here to <a href='index.php'>Login</a></p></div>";
			
        }
    }else{
?>
		
	
	
	
	<div class="container">
		<img src="img/login.png">
	
		<form action="" method="post" name="login">
        
		<div class="user-input">
				<input type="text" name="name" placeholder="Name" required />
			</div> 
		
		<div class="user-input">
				<input type="text" name="username" placeholder="Username" required />
			</div> 
		
		<div class="user-input">
				<input type="email" name="email" placeholder="email address" required />
			</div> 
		
		<div class="user-input">
				<input type="text" name="phone" placeholder="Phone Number" required />
			</div> 
    
    
			<div class="form-input">
				<input type="password" name="password" placeholder="Password" required />
			</div>
		
    
            	<input name="submit" type="submit" value="Sign-up" class="btn-login" onclick="check(this.form)"/><br>

	</form>
	
</div>

<?php } ?>
</body>
</html>

