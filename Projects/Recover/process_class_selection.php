<?php
// Start the session to use cookies
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_class'])) {
        // Retrieve the selected class_id
        $selectedClassId = $_POST['selected_class'];

        // Store the selected class_id in a cookie
        setcookie('selected_class_id', $selectedClassId, time() + (86400 * 30), "/"); // 86400 seconds = 1 day

        // Redirect to the page that displays attendance for the selected class
        header('Location: attendance.php');
        exit();
    }
}
?>