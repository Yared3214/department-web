<?php

$servername = "localhost";
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>