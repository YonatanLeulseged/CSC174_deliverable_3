<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="welcome.php" method="post">
Username: <input type="text" name="username"><br>
Legend name: <input type="text" name="legendname"><br>
<input type="submit">
</form
>

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

mysqli_close($conn);
?>

</body>
</html>
