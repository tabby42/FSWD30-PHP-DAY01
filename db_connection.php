<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr09_irene_theiss_carrental";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

$sql = "SELECT * FROM extra";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //fetch_assoc() puts all the results into an associative array
    while($row = $result->fetch_assoc()) {
    	var_dump($row );
        echo $row["extra_name"]. "<br>";
    }
} else {
    echo "0 results";
}

//close db connection
$connection->close();

?>