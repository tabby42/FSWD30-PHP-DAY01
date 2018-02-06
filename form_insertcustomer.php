<?php
require_once 'dbconfig.php';

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

//Escape user inputs for security
$salutation = mysqli_real_escape_string($connection, $_POST['salutation']);
$firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
$lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
$birthdate = mysqli_real_escape_string($connection, $_POST['birthdate']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phone_country = mysqli_real_escape_string($connection, $_POST['phone_country']);
$phone = mysqli_real_escape_string($connection, $_POST['phone']);
$dl_num = mysqli_real_escape_string($connection, $_POST['dl_num']);

var_dump($phone_country);

$sql = "INSERT INTO customer (salutation, firstname, lastname, birthdate, email, fk_phone_country_code_id, phone_nr, drivers_license_nr) VALUES ('$salutation', '$firstname', '$lastname', '$birthdate', '$email', $phone_country, '$phone', '$dl_num')";

if (mysqli_query($connection, $sql)) {
    echo "<h1>New record created.<h1>";
} else {
    echo "<h1>Record creation error for: </h1>" . "<p>" . $sql . "</p>" . 
          mysqli_error($connection);
}

//close db connection
$connection->close();

?>