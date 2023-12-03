
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get temperature and humidity from GET request
$temperature = $_GET['temperature'];
$humidity = $_GET['humidity'];
$deviceId = $_GET['deviceId'];

// Insert data into database
$sql = "INSERT INTO sensor_data (temperature, humidity, device_id) VALUES ('$temperature', '$humidity', '$deviceId')";


if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
