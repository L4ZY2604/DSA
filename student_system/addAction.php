<!-- <html>

<head>
    <title>Add Data</title>
</head>

<body> -->
    <?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
// Escape special characters in string for use in SQL statement
$student_ID = mysqli_real_escape_string($mysqli, $_POST['student_id']);
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);


// Check for empty fields
if (empty($student_ID) || empty($name) || empty($age) || empty($email) || empty($address)) 

{
    
    if (empty($student_ID)) {
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
// If all the fields are filled (not empty) 

// Insert data into database
$result = mysqli_query($mysqli, "INSERT INTO student_information (`student_id`, `name`, `age`, `email`, `address`) VALUES ('$student_ID','$name', '$age', '$email', '$address')");

session_start();
        $_SESSION['added_message'] = "Added successfully!";
        header("Location: student_list.php"); // Redirect to homepage
        exit();

    }
}
?>
</body>

</html>