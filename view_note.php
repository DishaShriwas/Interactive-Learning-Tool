<?php
// Include database connection
include 'db.php';
include 'header.php';

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
        // Check if the file exists
        if (file_exists($file_path)) {
            // Display the note title
            echo "<h2>Note Title: " . $row['note_title'] . "</h2>";
            // Display the note content
            echo "<embed src='" . $file_path . "' width='100%' height='600px' />";
        } else {
            echo "Note file not found.";
        }
    } else {
        echo "Note not found.";
    }
} else {
    echo "Note ID not provided.";
}
?>

<?php
// Include footer
include 'footer.php';
?>
