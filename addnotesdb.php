<?php
// Include database connection
include 'db.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['note_title']) && isset($_POST['class']) && isset($_POST['section']) && isset($_FILES['note_file'])) {
        // Escape user inputs for security
        $note_title = mysqli_real_escape_string($conn, $_POST['note_title']);
        $class = mysqli_real_escape_string($conn, $_POST['class']);
        $section = mysqli_real_escape_string($conn, $_POST['section']);

        // File upload handling
        $target_dir = "uploads/"; // Specify the directory where you want to save the PDF files
        $file_name = uniqid() . "_" . basename($_FILES["note_file"]["name"]); // Generate unique filename
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        

        // Allow certain file formats (Only allowing PDF files)
        if($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["note_file"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now insert data into database
                $sql = "INSERT INTO notes (note_title, class, section, file_name,tid,dept) VALUES ('$note_title', '$class', '$section', '$file_name','$sessionemail','$sessiondept')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>
alert('Notes Uploaded!!');
window.location.href='managenotes.php';
</script>";
                } else {
                    echo "<script>
alert('Something Went Wrong');
window.location.href='managenotes.php';
</script>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
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
