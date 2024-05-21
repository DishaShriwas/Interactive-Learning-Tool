<?php
// Include header
include 'header.php';

// Check if the faculty ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the faculty ID from the URL
    $faculty_id = $_GET['id'];

    // Include database connection
    include 'db.php';

    // Fetch faculty data based on ID
    $sql = "SELECT * FROM faculty WHERE id = $faculty_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch faculty details
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $department = $row['dept'];

        // Close database connection
        $conn->close();
    } else {
        echo "Faculty not found.";
        exit();
    }
} else {
    echo "Faculty ID is missing.";
    exit();
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Faculty</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Faculty</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Faculty</h3>
                        </div>

                        <form action="update_faculty.php" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?php echo $faculty_id; ?>">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter faculty's name" value="<?php echo $name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $password; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment">Department</label>
                                    <select class="form-control" name="department" id="exampleInputDepartment">
                                        <option value="cse" <?php if ($department == 'cse') echo 'selected'; ?>>CSE</option>
                                        <option value="it" <?php if ($department == 'it') echo 'selected'; ?>>IT</option>
                                        <option value="extc" <?php if ($department == 'extc') echo 'selected'; ?>>EXTC</option>
                                        <option value="mech" <?php if ($department == 'mech') echo 'selected'; ?>>Mech</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
// Include footer
include 'footer.php';
?>
