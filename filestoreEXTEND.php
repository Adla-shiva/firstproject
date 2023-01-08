<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// // Connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);
// $db = new mysqli('localhost', 'username', 'password', 'database_name');

// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the file information
  $file_name = $_FILES['file']['name'];
  $file_type = $_FILES['file']['type'];
  $file_size = $_FILES['file']['size'];
  $file_content = file_get_contents($_FILES['file']['tmp_name']);
  
  // Prepare the INSERT statement
  $stmt = $db->prepare("INSERT INTO files (name, type, size, content) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $file_name, $file_type, $file_size, $file_content);
  
  // Execute the statement
  $stmt->execute();
  
  // Close the statement and connection
  $stmt->close();
  $db->close();
  
  // Redirect the user to a page to confirm that the file was uploaded
  header('Location: fileread.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<!-- HTML form to allow the user to select and upload a file -->
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="file"><br>
  <input type="submit" name="submit" value="Upload">
</form>
</body>
</html>



