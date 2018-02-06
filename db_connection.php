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

//read data
$sql = "SELECT * FROM extra";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //fetch_assoc() puts all the results into an associative array
    while($row = $result->fetch_assoc()) {
    	//var_dump($row );
        echo $row["extra_name"]. " " . $row["price"] . "<br>";
    }
} else {
    echo "0 results";
}

//free result set
//It is a good practice to release cursor memory at the end of each SELECT statement
mysqli_free_result($result);

//insert data
$sql = "INSERT INTO country (country_code, country_name) VALUES ('CH', 'Switzerland')";

if (mysqli_query($connection, $sql)) {
    echo "New record created.\n";
} else {
    echo "Record creation error for: " . $sql . "\n" . mysqli_error($connection);
}

//close db connection
$connection->close();

?>