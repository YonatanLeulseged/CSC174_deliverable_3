 <html>
<body>

 <form action= "deliverable4.php" method="post">
        <br>
<input type="submit" value="View Table">
</form>

</body>

<?php

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

//INSERT
$sqlPlayerInsert = $conn->prepare("INSERT INTO PLAYER (userName, legendName)
VALUES (?,?)");

//PREPARED STATEMENTS
$sqlPlayerInsert->bind_param("ss",$playername,$legendname);

$playername = $_POST["username"];
$legendname = $_POST["legendname"];

$sqlPlayerInsert->execute();

/*
if ($conn->query($sqlPlayerInsert) === TRUE) {
  echo "New Legend record created successfully";
} else {
  echo "Error: " . $sqlPlayerInsert . "<br>" . $conn->error;
}
*/

$sqlPlayerInsert->close();

mysqli_close($conn);
?>
</html>
