<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script>
      function ass() {
        document.location = "indexesss.php";
      }
    </script>
  </head>
  <body style="background-color: green">
    <center style="border: 2px solid blue">
      <h1>TO DO LIST</h1>
      <!-- starting  add -->
      <form action="remove.php" method="post">
        <div
          style="
            display: flex;
            flex-direction: column;
            /* border: 2px solid black; */
            height: 300px;
            width: min-content;
          "
        >
          <div>
            <label>enter serial no:</label>
            <input
              id="a1"
              type="text"
              name="sv1"
              style="width: 250px; height: 40px"
              required
            />
          </div>
          <br />
          <div style="display: flex">
            <div>
              <button
                onclick="ass()"
                style="margin-right: 92px; background-color: blue; width: 100px"
                id="o"
              >
                home
              </button>
            </div>
            <div>
              <input
                id="l"
                type="submit"
                value="Remove"
                style="width: 100px; background-color: blue"
              />
            </div>
          </div>
        </div>
      </form>
    </center>
    <center>

    <?php
session_start();
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
// if($_SESSION["logged_in"] === true){
//   $y=$_SESSION["u1"];
// }
// if($_SESSION["reg"] === true){
//   $y=$_SESSION["xx"];
// }
$y=$_SESSION["xx"];
$sql = "SELECT sno, work FROM works where fgd='$y'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h1 style='border:2px solid black;width:300px'>";
    echo "sno: ". $row["sno"]. "  work: " . $row["work"].  "<br>";
    echo "</h1>";
    // echo "<form action='av.php' method='post'>";
    // echo "<input type='submit' name='remove'>";
    // echo "</form>"
  }
} else {
  echo "0 results";
}
$conn->close();
?>



    </center>




  </body>
</html>
