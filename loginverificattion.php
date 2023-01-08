<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$_SESSION["logged_in"] =false;
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the user has submitted their details
if (isset($_POST["Username"]) && isset($_POST["password"])) {
  // Escape the user input to protect against SQL injection
  $sy = mysqli_real_escape_string($conn, $_POST["Username"]);
  $pass = mysqli_real_escape_string($conn, $_POST["password"]);

  // Query the database to check if the user exists and the password is correct
  $query = "SELECT * FROM register WHERE username = '$sy' AND pass = '$pass'";
  $result = mysqli_query($conn, $query);

  // If the query returns a non-empty result, the login was successful
  if (mysqli_num_rows($result) > 0) {
    // Set a session variable to indicate that the user is logged in
    session_start();
    // $_SESSION["logged_in"] = true;
    $_SESSION["xx"]=$sy;

    // Redirect the user to the dashboard page
    header("Location: indexesss.php");
    exit();
  } else {
    // Set an error message to be displayed on the login page
    echo "<script>window.alert('you entered invalid credentials or you dont have account');</script>";
    echo"<script>document.location='login.php';</script>";

  }
}
?>

