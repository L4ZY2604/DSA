<?php session_start();

// Check if the session variable is set and show an alert
if (isset($_SESSION['login_success'])) {
    echo "<script>alert('" . $_SESSION['login_success'] . "');</script>";
    
    // Clear the session message so it doesn't show again when the page is refreshed
    unset($_SESSION['login_success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetHome.css">
    <title>Home Page</title>
</head>
<body>
    <header>
        <div class="header-left">
            <img src="assets/PUPLogo.png" alt="PUP LOGO">
            <div class="header-text">
                <h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
                <p>INSTITUTE OF TECHNOLOGY</p>
            </div>
        </div>
        <a href="login.php">LOG OUT</a>
    </header>

    <main>
        <div class="home-title">HOME PAGE</div>
        <div class="menu-container">
            <div class="menu-item">
                <a href="student_list.php">
                    <img src="assets/listicon.png" alt="Student List">
                </a>
                <a href="student_list.php" class="menu-label">Student List</a>
            </div>
            <div class="menu-item">
                <a href="profile.php">
                    <img src="assets/profileicon.png" alt="Profile">
                </a>
                <a href="profile.php" class="menu-label">PROFILE</a>
            </div>
        </div>
    </main>
</body>
</html>
