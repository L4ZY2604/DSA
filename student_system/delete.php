<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$id = $_GET['student_id'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM student_information WHERE student_id = '$id'");

// Redirect to the main display page (index.php in our case)
echo "<script>Data deleted successfully!</script>";
header("Location:student_list.php");
