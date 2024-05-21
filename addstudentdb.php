<?php

include 'db.php';


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    
    // SQL query to insert data into database
    $sql = "INSERT INTO `student` (`name`, `email`, `password`, `dept`, `year`, `section`) VALUES ('$name', '$email', '$password', '$dept', '$year', '$section')";
    
    if ($conn->query($sql) === TRUE) {
       echo "<script>
alert('Student Created Successfully');
window.location.href='dashboard.php';
</script>";
    } else {
       echo "<script>
alert('Something Went Wrong');
window.location.href='dashboard.php';
</script>";
    }
}






?>