<?php 

require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	
	$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username = '$username'");

	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_assoc($result);

		if ($password == $row['password']) { // If passwords match then enter if not get out
			session_start();
				$_SESSION['login_success'] = "Login successfully!";
				header("Location: Homepage.php"); // Redirect to homepage
				exit();

    
		}else {
			session_start();
				$_SESSION['login_fail'] = "Login failed, incorrect password.";
				header("Location: Login.php"); // Redirect to homepage
				exit();
			
		}

	} 	
	else {
		session_start();
		
		$_SESSION['login_fail'] = "No account found with the provided username.";
		header("Location: Login.php"); // Redirect to homepage
		exit();

		}
	}
else {
	session_start();	
		$_SESSION['login_fail'] = "Something went wrong, idk what";
		header("Location: Login.php"); // Redirect to homepage
		exit();	
}


?>