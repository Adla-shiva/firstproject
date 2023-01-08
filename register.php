<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$_SESSION["reg"] = false;
$s1=$_POST['User1'];
$s2=$_POST['email1'];
$s3=$_POST['password1'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// create table;

// $sql7 = "CREATE TABLE `$s1` (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     work VARCHAR(30) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";

// if ($conn->query($sql7) === TRUE) {
//   echo"adla";
// } 
// else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }



// end

$sql6= "INSERT INTO register
VALUES ('$s1','$s2','$s3')";

if ($conn->query($sql6) === TRUE) {
  session_start();
  // $_SESSION["reg"] = true;
  $_SESSION["xx"]=$s1;


    // end table;
    // e=if statements
  echo "<script>";
  echo "document.location='indexesss.php';";
  echo "</script>";
    // end
  
} else {
  echo "Error:shiva " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>