<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="welcome4.php" method="post">
Username: <input type="text" name="username"><br>
Legend name: <input type="text" name="legendname"><br>
<input type="submit">
</form>

<br> </br>
<br> </br>
<h2> PLAYER TABLE </h2>

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

?>


<table>

<?php

//SELECT
$sql = "SELECT userName, legendName FROM PLAYER";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   //echo ' <tr>
    //echo ' <tr>

        //<td>'.Player name.'</td>
        //<td>'.Legend name.'</td>




        //</tr>';

    while($row = $result->fetch_assoc()) {

        $username=$row["userName"];
        $legendname=$row["legendName"];

        echo '
                <tr>
                <td>'.$username.'</td>
                <td>'.$legendname.'</td>

                </tr>';

        //echo "<br>"."<br>"."Username: ".$row["username"]."<br>"." Legend name: ".$row["legendName"]."<br>";
    }
} else {
echo "0 results";

}


?>


</table>



<?php

mysqli_close($conn);
?>

</body>
</html>
