<?php
require_once 'connection.php'; // Include your database connection script

// Check if the student_id is provided in the POST request
if (isset($_POST['student_id'])) {
    $student_id = (int)$_POST['student_id'];

    // Perform the deletion of the student from the database
    $sql = "DELETE FROM students WHERE student_id = $student_id";

    if ($connection->query($sql) === TRUE) {
        echo "success"; // Return "success" if the deletion is successful
    } else {
        echo "error"; // Return an error message if the deletion fails
    }
} else {
    echo "error"; // Return an error message if student_id is not provided in the
}