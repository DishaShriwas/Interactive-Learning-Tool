<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Escape user input for security
    $message_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete message from the database
    $sql = "DELETE FROM messages WHERE id='$message_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to view sent messages page
        header("Location: sentmessage.php");
        exit();
    } else {
        echo "<script>
        alert('Something Went Wrong');
        window.location.href='sentmessage.php';
        </script>";
    }
} else {
    echo "Invalid request.";
}

// Close database connection
$conn->close();
?>
