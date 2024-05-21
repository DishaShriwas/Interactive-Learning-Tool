<?php

include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // SQL query to insert data into database
    $sql = "INSERT INTO library (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert('Librarien Created Successfully');
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