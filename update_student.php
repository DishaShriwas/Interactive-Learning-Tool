<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['dept']) && isset($_POST['year']) && isset($_POST['section'])) {
        // Collect form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];
        $year = $_POST['year'];
        $section = $_POST['section'];

        // Update student record in the database
        $sql = "UPDATE student SET name='$name', email='$email', dept='$dept', year='$year', section='$section' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to the student list page after successful update
            header("Location: managestudent.php");
            exit();
        } else {
            echo "Error updating student: " . $conn->error;
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
