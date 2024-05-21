<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (!empty($_POST['id']) && !empty($_POST['assignment_name']) && !empty($_POST['deadline']) && !empty($_POST['description']) && !empty($_POST['class']) && !empty($_POST['section'])) {
        // Escape user inputs for security
        $assignment_id = $_POST['id'];
        $assignment_name = mysqli_real_escape_string($conn, $_POST['assignment_name']);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);
        $section = mysqli_real_escape_string($conn, $_POST['section']);

        // Update assignment in the database
        $sql = "UPDATE assignments SET assignment_name='$assignment_name', deadline='$deadline', description='$description', class='$class', section='$section' WHERE id='$assignment_id'";
        if ($conn->query($sql) === TRUE) {
            // Redirect to manage assignments page
            header("Location: manageassignment.php");
            exit();
        } else {
            echo "Error updating assignment: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

// Close database connection
$conn->close();
?>
