<?php
// Connection to the database
require_once("dbConnection.php");

// get data to edit
$id = $_GET['student_id'];

$result = mysqli_query($mysqli, "SELECT * FROM student_information WHERE student_id = '$id'");

$resultData = mysqli_fetch_assoc($result);

$s_id = $resultData['student_id'];
$name = $resultData['name'];
$age = $resultData['age'];
$email = $resultData['email'];
$address = $resultData['address'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="studentEdit.css">
  <title>Edit Student Data</title>
 
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
      <a href="HOMEPAGE.html">HOME</a>
      <a href="student_list.html">STUDENT LIST</a>
      <a href="PROFILE.html">PROFILE</a>
      <a href="LOGIN.html">LOG OUT</a>
    </nav>
  </header>

  <div class="container">
    <div class="image">
      <img src="assets/6075524196072538068.jpg" alt="PUP">
    </div>
    <div class="form-container">
      <h2>EDIT STUDENT DATA</h2>

      <form id="studentForm" method="post" action="editAction.php">
        <label for="student-id">STUDENT ID:</label>
        <input type="text" id="student-id" name="new_student_id" value = "<?php echo $s_id; ?>" required>

        <label for="name">NAME:</label>
        <input type="text" id="name" name="name" value = "<?php echo $name; ?>" required>

        <label for="age">AGE:</label>
        <input type="text" id="age" name="age" value = "<?php echo $age; ?>" required>

        <label for="email">EMAIL:</label>
        <input type="email" id="email" name="email" value = "<?php echo $email; ?>" required>

        <label for="address">ADDRESS:</label>
        <input type="text" id="address" name="address" value = "<?php echo $address; ?>" required>

        <input type="hidden" name="id" value="<?php echo $s_id; ?>">
        <button type="submit" name="update" value="Update">UPDATE</button>
      </form>
    </div>
  </div>

</body>
</html>
