<?php

include "dbconn.php";

// Get the connection object
$sql = "CREATE DATABASE Student";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select newly created database
$conn->select_db("Student");

// SQL to create table
$sql = "CREATE TABLE StudentRegistration (
  stud_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  year INT(4) NOT NULL,
  semister INT(4) NOT NULL,
  courses json NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table ComputerScienceStudents created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Use the connection object for database operations...

$conn->close();

?>