<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Escape user input for security
    $assignment_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete assignment from the database
    $sql = "DELETE FROM assignments WHERE id='$assignment_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to manage assignments page
        echo "<script>
alert('Deleted Successfully !!');
window.location.href='manageassignment.php';
</script>";
    } else {
        echo "<script>
alert('Something Went Wrong');
window.location.href='manageassignment.php';
</script>";
    }
} else {
    echo "Invalid request.";
}

// Close database connection
$conn->close();
?>
