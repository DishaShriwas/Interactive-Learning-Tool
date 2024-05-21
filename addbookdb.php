<?php
// Include database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['book_name']) && isset($_POST['unique_code'])) {
        // Collect form data
        $book_name = $_POST['book_name'];
        $unique_code = $_POST['unique_code'];

        // Insert book details into the database
        $sql = "INSERT INTO book (`name`, `code`) VALUES ('$book_name', '$unique_code')";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to the add book page after successful insertion
            echo "<script>
alert('Book Added Successfully!!');
window.location.href='addbook.php';
</script>";
            exit();
        } else {
            echo "Error adding book: " . $conn->error;
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
