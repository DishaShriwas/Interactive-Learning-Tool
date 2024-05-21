<?php
// Include database connection
include 'db.php';

// Check if student ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the student ID from the URL
    $student_id = $_GET['id'];

    // Delete student record from the database
    $sql = "DELETE FROM student WHERE id=$student_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the student list page after successful deletion
        header("Location: managestudent.php");
        exit();
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Student ID is missing.";
}

// Close database connection
$conn->close();
?>
