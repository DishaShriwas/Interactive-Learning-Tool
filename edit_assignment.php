<?php
// Include header
include 'header.php';

// Include database connection
include 'db.php';

// Check if assignment ID is provided
if (isset($_GET['id'])) {
    $assignment_id = $_GET['id'];

    // Fetch assignment data from the database
    $sql = "SELECT * FROM assignments WHERE id = '$assignment_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Assignment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="manageassignment.php">Manage Assignments</a></li>
                        <li class="breadcrumb-item active">Edit Assignment</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Assignment</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Edit Assignment Form -->
                            <form action="update_assignment.php" method="POST">
                                <div class="form-group">
                                    <label for="assignmentName">Assignment Name</label>
                                    <input type="text" name="assignment_name" class="form-control" id="assignmentName" value="<?php echo $row['assignment_name']; ?>" required>
                                    <input type="text" name="id" value="<?php echo $assignment_id;  ?>" hidden="">
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input type="datetime-local" name="deadline" class="form-control" id="deadline" value="<?php echo date('Y-m-d\TH:i', strtotime($row['deadline'])); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4" required><?php echo $row['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <select name="class" class="form-control" id="class" required>
                                        <option value="1" <?php if ($row['class'] == '1') echo 'selected'; ?>>1st Year</option>
                                        <option value="2" <?php if ($row['class'] == '2') echo 'selected'; ?>>2nd Year</option>
                                        <option value="3" <?php if ($row['class'] == '3') echo 'selected'; ?>>3rd Year</option>
                                        <option value="4" <?php if ($row['class'] == '4') echo 'selected'; ?>>4th Year</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <select name="section" class="form-control" id="section" required>
                                        <option value="A" <?php if ($row['section'] == 'A') echo 'selected'; ?>>A</option>
                                        <option value="B" <?php if ($row['section'] == 'B') echo 'selected'; ?>>B</option>
                                        <option value="C" <?php if ($row['section'] == 'C') echo 'selected'; ?>>C</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary">Update Assignment</button>
                            </form>
                            <!-- End Edit Assignment Form -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
    } else {
        echo "Assignment not found.";
    }
} else {
    echo "Assignment ID is not provided.";
}

// Include footer
include 'footer.php';
?>
