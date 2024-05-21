<?php
// Include header
include 'header.php';

// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the student ID from the URL
    $student_id = $_GET['id'];

    // Include database connection
    include 'db.php';

    // Fetch student data based on ID
    $sql = "SELECT * FROM student WHERE id = $student_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch student details
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $dept = $row['dept'];
        $year = $row['year'];
        $section = $row['section'];

        // Close database connection
        $conn->close();
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Student ID is missing.";
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
                    <h1 class="m-0">Edit Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Student</li>
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
                            <h3 class="card-title">Edit Student</h3>
                        </div>

                        <form action="update_student.php" method="POST">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?php echo $student_id; ?>">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter student's name" value="<?php echo $name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment">Department</label>
                                    <select class="form-control" name="dept" id="exampleInputDepartment">
                                        <option value="cse" <?php if($dept == 'cse') echo 'selected'; ?>>CSE</option>
                                        <option value="it" <?php if($dept == 'it') echo 'selected'; ?>>IT</option>
                                        <option value="extc" <?php if($dept == 'extc') echo 'selected'; ?>>EXTC</option>
                                        <option value="mech" <?php if($dept == 'mech') echo 'selected'; ?>>Mech</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputYear">Year</label>
                                    <select class="form-control" name="year" id="exampleInputYear">
                                        <option value="1" <?php if($year == '1') echo 'selected'; ?>>1st Year</option>
                                        <option value="2" <?php if($year == '2') echo 'selected'; ?>>2nd Year</option>
                                        <option value="3" <?php if($year == '3') echo 'selected'; ?>>3rd Year</option>
                                        <option value="4" <?php if($year == '4') echo 'selected'; ?>>4th Year</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSection">Section</label>
                                    <select class="form-control" name="section" id="exampleInputSection">
                                        <option value="A" <?php if($section == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if($section == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if($section == 'C') echo 'selected'; ?>>C</option>
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
