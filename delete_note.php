<?php
// Include database connection
include 'db.php';

// Check if note ID is set in the URL
if (isset($_GET['id'])) {
    // Get the note ID from the URL
    $note_id = $_GET['id'];

    // Fetch the note data from the database
    $sql = "SELECT * FROM notes WHERE id='$note_id'";
    $result = $conn->query($sql);

    // Check if the note exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Construct the file path
        $file_path = "uploads/" . $row['file_name'];

        // Delete the note record from the database
        $delete_sql = "DELETE FROM notes WHERE id='$note_id'";
        if ($conn->query($delete_sql) === TRUE) {
            // Check if the file exists
            if (file_exists($file_path)) {
                // Delete the file from the server
                unlink($file_path);
            }
            echo "<script>
alert('Notes Deleted');
window.location.href='managenotes.php';
</script>";
        } else {
           echo "<script>
alert('Something Went wrong!!');
window.location.href='managenotes.php';
</script>";
        }
    } else {
        echo "Note not found.";
    }
} else {
    echo "Note ID not provided.";
}

// Close database connection
$conn->close();
?>
