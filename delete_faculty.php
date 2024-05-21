<?php
// Include database connection
include 'db.php';

// Check if faculty ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the faculty ID from the URL
    $faculty_id = $_GET['id'];

    // Delete faculty record from the database
    $sql = "DELETE FROM faculty WHERE id=$faculty_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the faculty list page after successful deletion
        header("Location: managefaculty.php");
        exit();
    } else {
        echo "Error deleting faculty: " . $conn->error;
    }
} else {
    echo "Faculty ID is missing.";
}

// Close database connection
$conn->close();
?>
