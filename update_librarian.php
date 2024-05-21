<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email'])) {
        // Collect form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Update librarian record in the database
        $sql = "UPDATE library SET name='$name', email='$email' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to the librarian list page after successful update
            header("Location: managelibrarian.php");
            exit();
        } else {
            echo "Error updating librarian: " . $conn->error;
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
