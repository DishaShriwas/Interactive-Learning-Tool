<?php

include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    
    // SQL query to insert data into database
    $sql = "INSERT INTO faculty(`name`, `email`, `password`, `dept`) VALUES ('$name', '$email', '$password', '$department')";
    
    if ($conn->query($sql) === TRUE) {
       echo "<script>
alert('Faculty Created Successfully');
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