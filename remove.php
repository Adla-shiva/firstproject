<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();
if($_SESSION["logged_in"]=== true){
  $c=$_SESSION["u1"];
}
if($_SESSION["reg"] === true){
  $c=$_SESSION["xx"];
}
$g=$_POST['sv1'];
// sql to delete a record
$sql1 = "SELECT sno, work FROM works WHERE sno='$g' and fgd='$c' ";
$result = $conn->query($sql1);
if($result->num_rows > 0){
  $sql = "DELETE FROM works WHERE sno='$g'";
  if($conn->query($sql)==TRUE){
  $sql2 = "UPDATE works SET sno=sno-1 WHERE sno>'$g' and fgd='$c' ";
  // updation
  if ($conn->query($sql2) === TRUE) {
    echo "<script>";
  echo "alert('record deleted successfully');";
  echo " document.location='remove1.php';";
  echo "</script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  // end
  }
  else {
    echo "Error deleting record1: " . $conn->error;
  }
}
 else {
  echo "<script>";
  echo "alert('enter a valid seriel no:');";
  echo " document.location='remove1.php';";
  echo "</script>";
}

$conn->close();
?>