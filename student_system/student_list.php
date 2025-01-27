<?php
// Include the database connection file

require_once("dbConnection.php");

// Pagination details
$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;


// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM student_information ORDER BY name ASC LIMIT $records_per_page OFFSET $offset");

// count details
$dataCount = mysqli_query($mysqli, "SELECT COUNT(*) FROM student_information ");
$count = mysqli_fetch_row($dataCount);
$totalCount = $count[0];
$total_pages = ceil($totalCount / $records_per_page);

// Start the session to check for the session variable
session_start();

// Check if the session variable is set and show an alert
if (isset($_SESSION['update_message'])) {
    echo "<script>alert('" . $_SESSION['update_message'] . "');</script>";
    
    // Clear the session message so it doesn't show again when the page is refreshed
    unset($_SESSION['update_message']);
}
else if (isset($_SESSION['added_message'])) {
    echo "<script>alert('" . $_SESSION['added_message'] . "');</script>";
    unset($_SESSION['added_message']);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentInfoStylesheet.css">
    <title>Student Info</title>
</head>
<body>
    <header> 
        <div class="header-left">
            <img class="logo" src="assets/PUPLogo.png">
        </div>
        
        <div class="header-text">
            <h1>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h1>
            <p>INSTITUTE OF TECHNOLOGY</p>
        </div>

            <div class="nav-links">
                <a href="homepage.php">HOME</a>
                <a href="PROFILE.php">PROFILE</a>
                <a href="Login.php">LOGOUT</a>
            </div>           
    </header>
   <style>
    main {
        display: flex;
        justify-content: flex-end;
        padding: 20px;
      }
      
      .content {
        width: 50%;
        text-align: right;
      }
      
      .add-student h2 {
        font-size: 24px;
        color: #800000;
      }
      
      .add-button {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #800000;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-transform: uppercase;
      }
      
      .add-button:hover {
        background-color: #660000;
      }

      .container{
        padding: 3px;
      }

      .container h2 {
        margin-top: 0%;

      }
   </style>
    <main>
        <div class="add-student">

            <a href="ADD STUDENT DATA.php" class="add-button">ADD STUDENT DATA</a>

        </div>
      </main>
       
    <div class="container">
        <h2>Student List</h2>
        <?php echo "<p>Total Count: " . $totalCount . "</p>"; ?>

        <table>
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>

            <?php
            // Fetch the data and display in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['student_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td class='action-button'>
                    <a href=\"edit.php?student_id={$row['student_id']}\" class='edit-button'>Edit</a> 
                    <a href=\"delete.php?student_id={$row['student_id']}\" onClick=\"return confirm('Are you sure you want to delete this student?')\" class='delete-button'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <?php 
            // echo "Displaying records " . ($offset + 1) . " to " . min($offset + $records_per_page, $records_per_page * $total_pages) . ".<br>";

            echo "<div class='pagination'>";

            if ($current_page > 1) echo "<a href='?page=" . ($current_page - 1) . "'>&laquo; Previous</a> ";

            for ($i = 1; $i <= $total_pages; $i++) {

                echo ($i == $current_page) ? "<strong>$i</strong> " : "<a href='?page=$i'>$i</a> ";
            }
            if ($current_page < $total_pages) echo "<a href='?page=" . ($current_page + 1) . "'>Next &raquo;</a>";
            echo "</div>";
        ?>
    </div>


</body>
</html>