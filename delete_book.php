<?php
// Include database connection
include 'db.php';

// Check if book ID is provided in the URL
if(isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Delete book from the database
    $sql = "DELETE FROM book WHERE id = $book_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the manage book page after successful deletion
        echo "<script>
alert('Book Deleted');
window.location.href='managebook.php';
</script>";
        exit();
    } else {
        echo "Error deleting book: " . $conn->error;
    }
} else {
    echo "Book ID is missing.";
    exit();
}

// Close database connection
$conn->close();
?>
