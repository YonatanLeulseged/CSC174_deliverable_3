<html>
<body>

User name <?php echo $_POST["username"]; ?><br>
Legend name <?php echo $_POST["legendname"]; ?>

 <form action= "deliverable3.php" method="post">
        <br>
<input type="submit" value="View Table">
</form>

</body>

<?php
echo("<br>"."Top"."<br>");
$servername = "ecs-pd-proj-db.ecs.csus.edu";
$username = "CSC174030";
$password = "Csc134_409292268";
$mydb = "CSC174030";

// Create connection
$conn = new mysqli($servername, $username, $password,$mydb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//$username = $_POST["username"];
//$legendname = $_POST["legendname"];
//echo($legendname);

//INSERT


$sqlPlayerInsert = $conn->prepare("INSERT INTO PLAYER (userName, legendName)
VALUES (?,?)");

$sqlPlayerInsert->bind_param("ss",$playername,$legendname);
$playername = $_POST["username"];
$legendname = $_POST["legendname"];
$sqlPlayerInsert->execute();

echo("here");

if ($conn->query($sqlPlayerInsert) === TRUE) {
  echo "New Legend record created successfully";
} else {
  echo "Error: " . $sqlPlayerInsert . "<br>" . $conn->error;
  }

$sqlPlayerInsert->close();

//SELECT
$sql = "SELECT username, legendName FROM PLAYER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br>"."<br>"."Username: ".$row["username"]."<br>"." Legend name: ".$row["legendName"]."<br>";
    }
} else {
echo "0 results";

}


echo("<br>"."Bottom"."<br>");
mysqli_close($conn);

?>
</html>
