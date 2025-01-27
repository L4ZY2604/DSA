<?php
// Include the database connection file
require_once("dbConnection.php");


if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$new_student_id = mysqli_real_escape_string($mysqli, $_POST['new_student_id']); // this is handling the newly entered student id
	$id = mysqli_real_escape_string($mysqli, $_POST['id']); // this is for the original id before its changes
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);

// Check for empty fields
if (empty($new_student_id) || empty($name) || empty($age) || empty($email) || empty($address)) 

{
    
    if (empty($new_student_id)) {
        echo "<font color='red'>Student ID field is empty.</font><br/>";
    }

    if (empty($name)) {
        echo "<font color='red'>Name field is empty.</font><br/>";
    } 
        
    if (empty($age)) {
        echo "<font color='red'>Age field is empty.</font><br/>";
    }


    if (empty($email)) {
        echo "<font color='red'>Email field is empty.</font><br/>";
    }

    if (empty($address)) {
        echo "<font color='red'>Address field is empty.</font><br/>";
    }

    // Show link to the previous page
    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	
} else { 
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE student_information SET 
												`student_id` = '$new_student_id',
												`name` = '$name', `age` = $age, 
												`address` = '$address', `email` = '$email' 
										WHERE `student_id` = '$id'" );

		session_start();
		$_SESSION['update_message'] = "Update successful!";
		header("Location: student_list.php"); // Redirect to homepage
		exit();
		

}
		// // Display success message
		// echo "<p><font color='green'>Data updated successfully!</p>";
		// echo "<a href='student_list.php'>View Result</a>";
}
?>