<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// // Connect to the database
$db = mysqli_connect($servername, $username, $password, $dbname);

// Connect to the database
// $db = new mysqli('localhost', 'username', 'password', 'database_name');

// Prepare the SELECT statement
$stmt = $db->prepare("SELECT * FROM files WHERE id = 10");

// Bind the placeholder parameter and execute the statement
// $file_id = 1;
// $stmt->bind_param(, $file_id);
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Fetch the row
$row = $result->fetch_assoc();

// Get the file information and content
$file_name = $row['name'];
$file_type = $row['type'];
$file_size = $row['size'];
$file_content = $row['content'];

// Set the HTTP headers for the file
header("Content-Type: $file_type");
header("Content-Length: $file_size");
header("Content-Disposition: inline; filename=$file_name");

// Output the file content
readfile($file_content);

// Close the statement and connection
$stmt->close();
$db->close();

?>
