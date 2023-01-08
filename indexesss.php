<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    
   
    <script>
      // function ab(){
      //   document.location='remove.php';
      // }
      // function ab1(){
      //   document.location='update.php';
      // }
      // function ab2(){
      //   document.location='count.php';
      // }
      function as(){
        document.location='remove1.php';
      }
        function log(){
        document.location='logout.php';
      }

      </script>
  </head>
  <body style="background-color:green;">

<!-- menu bar -->
        <div>
            <button onclick='log()' style="margin-right:92px;background-color:blue;width: 100px"id="o">Logout</button>
            
          </div>

      
<!-- menu bar end -->
<center style="border: 2px solid blue">
<h1>TO DO LIST</H1>
<!-- starting  add -->
<div id="shiva" style="display:block">
      <form action="abc.php" method="post">
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
            <input id="a" type="text" name="sv"  style="width: 250px;height:
            40px;"required>
          </div>
          <br />
          <div style="display:flex;">
          <div>
            
            <button onclick='as()' style="margin-right:92px;background-color:blue;width: 100px"id="o">remove</button>
            
          </div>
          <div>
            <input id="l" type="submit" value='Add' style="width: 100px;background-color:blue" />
          </div>
      </div>
        </div>
      </form>
      <div>
    </center>
    <!--  end -->

<center>

<!--additional pages-->
    <!-- <div>
    <form>
      <div style="display:flex;flex-direction:row;justify-content:space-around;border:2px solid grey;margin:20px">
      <div>
        <input onclick="ab()" style="height:50px;width:150px;background-color:blue;"type="submit" value="remove">
    </div>
    <div>
        <input onclick="ab1()" style="height:50px;width:150px;background-color:blue;" type="submit" value="update">
    </div>
    <div>
        <input onclick="ab2()" style="height:50px;width:150px;background-color:blue;" type="submit" value="count">
    </div>
    </form>
    </div>
    </div> -->
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
<!-- </h1> -->
    </center>
  </body>
</html>
