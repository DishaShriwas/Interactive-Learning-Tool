<?php
// Include header
include 'header.php';

// Include database connection
include 'db.php';

// Check if student ID is provided
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student data based on ID
    $sql = "SELECT * FROM student WHERE id = $student_id";
    $result = $conn->query($sql);

    // Check if student exists
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Student not found.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>Student ID not provided.</div>";
    exit;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Send Message</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Compose Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="send_message_handler.php" method="POST">
                                <input type="hidden" name="student_id" value="<?php echo $student['name']; ?>">
                                <div class="form-group">
                                    <label for="message_subject">Subject</label>
                                    <input type="text" class="form-control" id="message_subject" name="message_subject" required>
                                </div>
                                <div class="form-group">
                                    <label for="message_body">Message</label>
                                    <textarea class="form-control" id="message_body" name="message_body" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
// Include footer
include 'footer.php';
?>
