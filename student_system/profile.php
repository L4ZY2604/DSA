<?php 

require_once("dbConnection.php");

$result = mysqli_query($mysqli, "SELECT * FROM login");


$resultData = mysqli_fetch_assoc($result);

$username= $resultData['username'];
$password = $resultData['password'];

?> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetProfile.css">
    <title>Profile Page</title>
</head>

<body>
    <header>
        <div class="header-left">
            <img src="assets/PUPLogo.png" alt="PUP Logo">
            <div class="header-text">
                <h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
                <p>INSTITUTE OF TECHNOLOGY</p>
            </div>
        </div>
        <nav>
            <a href="Homepage.php">HOME</a>
            <a href="student_list.php">STUDENT LIST</a>
            <a href="Login.php">LOG OUT</a>
        </nav>
    </header>

    <div class="profile-container">
        <h1>PROFILE</h1>
        <div class="profile-icon">
            <img src="assets/icon-account.png" alt="Profile Logo">
        </div>
        <div class="profile-fields">
            <div class="field-group">
                <label for="username">USER:</label>
                <input type="text" id="username" value="<?php echo $username ?>" disabled>
            </div>
            <div class="field-group">
                <label for="email">PASSWORD:</label>
                <input type="email" id="email" value="<?php echo $password ?>" disabled>
            </div>
        </div>
    </div>
</body>
</html>