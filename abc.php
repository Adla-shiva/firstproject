<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$s=$_POST['sv'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// if($_SESSION["logged_in"]===true){
//   $x=$_SESSION["u1"];
// }
// if($_SESSION["reg"]===true){
//   $x=$_SESSION["xx"];
// }
$x=$_SESSION["xx"];
$sql = "INSERT INTO works (work,fgd)
VALUES ('$s','$x')";

if ($conn->query($sql) === TRUE) {
  echo "<script>";
  echo "document.location='indexesss.php';";
  echo "</script>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>