<?php
session_start();

// Check if the session variable is set and show an alert
if (isset($_SESSION['login_fail'])) {
    echo "<script>alert('" . $_SESSION['login_fail'] . "');</script>";
    
    // Clear the session message so it doesn't show again when the page is refreshed
    unset($_SESSION['login_fail']);
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetLogin.css">
    
    <!-- This is the style for the dialogue box -->
    <style> 
            .dialog {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #800000;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            display: none;
        }
        .dialog button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .dialog .back-btn {
            background-color: #f0ad4e;
            color: white;
        }
        .dialog .result-btn {
            background-color: #5cb85c;
            color: white;
            text-decoration: none;}
    </style>
    <title>Login</title>
</head>

<body>
    
    <div class="info-container">
        <div class="logo-container">
            <img src="assets/logo.svg" alt="logo">
        </div>
       <div class="background">
            <img src="assets/background.svg" alt="pup background">
       </div>

        <h1 class="title">
            DIT-SIS MODULE
        </h1>

        <h2 class="logo-title">
            POLYTECHNIC UNIVERSITY OF THE PHILIPPINES <br> INSITUTE OF TECHNOLOGY 
        </h2>

        <div class="input-container">
        <form class="form" method='post' action='loginAction.php'>
            <div class="username">
                <input type="text" name="username" placeholder="username" required >
            </div>
            <div class="password">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="button">
                <button type='submit' name='submit' value='submit' >Login</button>
            </div>
        </form>
    </div>
    </div> 
</body>
</html>