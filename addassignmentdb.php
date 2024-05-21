<?php
// Include database connection or establish connection here
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $assignment_name = $_POST['assignment_name'];
    $deadline = $_POST['deadline'];
    $description = $_POST['description'];
    $dept = $_POST['dept'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $tid = $_POST['tid'];

    // Insert data into database
    $sql = "INSERT INTO assignments (assignment_name, deadline, description, department, class, section, tid) 
            VALUES ('$assignment_name', '$deadline', '$description', '$dept', '$class', '$section', '$tid')";

    if (mysqli_query($conn, $sql)) {
       
        echo "<script>
alert('Assignment added successfully!');
window.location.href='manageassignment.php';
</script>";
    } else {
        // Error in adding assignment
        echo "<script>
alert('Something Went Wrong!');
window.location.href='dashboard.php';
</script>";
    }
}

// Close database connection
mysqli_close($conn);
?>
