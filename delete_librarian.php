<?php
// Include database connection
include 'db.php';

// Check if librarian ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the librarian ID from the URL
    $librarian_id = $_GET['id'];

    // Delete librarian record from the database
    $sql = "DELETE FROM library WHERE id=$librarian_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the librarian list page after successful deletion
        header("Location: managelibrarian.php");
        exit();
    } else {
        echo "Error deleting librarian: " . $conn->error;
    }
} else {
    echo "Librarian ID is missing.";
}

// Close database connection
$conn->close();
?>
