<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['department'])) {
        // Collect form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $department = $_POST['department'];

        // Update faculty record in the database
        $sql = "UPDATE faculty SET name='$name', email='$email', password='$password', dept='$department' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to the faculty list page after successful update
            header("Location: managefaculty.php");
            exit();
        } else {
            echo "Error updating faculty: " . $conn->error;
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
