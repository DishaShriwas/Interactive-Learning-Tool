<?php
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Assignment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Assignment</li>
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
                            <h3 class="card-title">Add New Assignment</h3>
                        </div>

                        <form action="addassignmentdb.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputAssignmentName">Assignment Name</label>
                                    <input type="text" name="assignment_name" class="form-control" id="exampleInputAssignmentName" placeholder="Enter assignment name" required="">
                                    <input type="text" name="tid" value="<?php echo $sessionemail; ?>" hidden="">
                                    <input type="text" name="dept" value="<?php echo $sessiondept; ?>" hidden="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDeadline">Deadline</label>
                                    <input type="datetime-local" name="deadline" class="form-control" id="exampleInputDeadline" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <textarea name="description" class="form-control" id="exampleInputDescription" rows="4" placeholder="Enter assignment description" required=""></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputClass">Class</label>
                                    <select name="class" class="form-control" id="exampleInputClass" required="">
                                       
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSection">Section</label>
                                    <select name="section" class="form-control" id="exampleInputSection" required="">
                                        
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
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
include 'footer.php';
?>
