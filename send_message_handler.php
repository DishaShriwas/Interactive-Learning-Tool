<?php
// Include database connection
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['student_id']) && isset($_POST['message_subject']) && isset($_POST['message_body'])) 
    {
        // Escape user inputs for security
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $message_subject = mysqli_real_escape_string($conn, $_POST['message_subject']);
        $message_body = mysqli_real_escape_string($conn, $_POST['message_body']);

        // Insert message into the database
        $sql = "INSERT INTO messages (student_id, message_subject, message_body,tid,tname) VALUES ('$student_id', '$message_subject', '$message_body','$sessionemail','$sessionname')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>
alert('Message Sent !!');
window.location.href='dashboard.php';
</script>";
        } else {
           echo "<script>
alert('something went wrong!!');
window.location.href='dashboard.php';
</script>";
        }
    } else {
        // Redirect back to the send message page with error message
        header("Location: send_message.php?error=1");
        exit;
    }
} else {
    // Redirect back to the send message page with error message
    header("Location: send_message.php?error=1");
    exit;
}

// Close database connection
$conn->close();
?>
