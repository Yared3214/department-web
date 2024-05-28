<?php

require_once ('dbconn.php'); // Include the connection file

// Function to convert checkbox values to JSON
function get_selected_courses()
{
    $courses = array();
    if (!empty($_POST['courses'])) {
        foreach ($_POST['courses'] as $course) {
            $courses[] = $course; // You can modify this to store course ID or name based on your data structure
        }
    }
    return json_encode($courses);
}

// Get form data
$full_name = $_POST['full-name'];
$student_id = $_POST['student-id'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$courses_json = get_selected_courses(); // Get JSON string of selected courses

$conn->select_db("Student");

// Prepare SQL statement
$sql = "INSERT INTO StudentRegistration (fullname, stud_id, year, semister, courses)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $full_name, $student_id, $year, $semester, $courses_json);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error registering student: " . $conn->error;
}

$stmt->close();
$conn->close();

?>