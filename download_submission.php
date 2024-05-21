<?php
// Include database connection
include 'db.php';

// Check if submission ID is set and valid
if (isset($_GET['id'])) {
    // Escape user input for security
    $submission_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch submission data from the database
    $sql = "SELECT * FROM submissions WHERE id = '$submission_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch submission details
        $row = $result->fetch_assoc();
        $file_path = "../student/assignment_submissions/".$row['submission_file']; // Assuming the submission file path is stored in the database

        // Check if the file exists
        if (file_exists($file_path)) {
            // Set headers for file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            
            // Read the file and output its contents
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Submission not found.";
    }
} else {
    echo "Invalid request.";
}

// Close database connection
$conn->close();
?>
