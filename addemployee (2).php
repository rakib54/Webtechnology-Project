<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/leftsidebar.php';
?>

<?php

$error = "";

if (isset($_POST['addemployee'])) {

    $fullname           = $_POST['fullname'];
    $username           = $_POST['username'];
    $password           = $_POST['password'];
    $repeatPassword     = $_POST['repeatPassword'];
    $email              = $_POST['email'];
    $phone              = $_POST['phone'];
    $address            = $_POST['address'];
    $status             = $_POST['status'];

    $employee_image       = $_FILES['image']['name'];
    $employee_image_temp  = $_FILES['image']['tmp_name'];
    move_uploaded_file($employee_image_temp, "images/$employee_image");

    if ($password != $repeatPassword) {
        $error = '<div class="alert alert-danger">Password Not Matched!!! Pleasy Try Again</div>';
    } else {
        $hassedPass = sha1($password);

        $query = "INSERT INTO employees (fullname, username, password, email, phone, address, joindate, status, user_role, image) VALUES ('$fullname', '$username', '$hassedPass', '$email', '$phone', '$address', now() ,'$status', '1', '$employee_image')";

        $addemployee = mysqli_query($db, $query);

        if (!$addemployee) {
            die("Query Failed " .mysqli_error($db));
        } else {
            header("Location: allemployee.php");
        }
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage All Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">All users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-12 -->
                <div class="col-lg-12">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Manage all Employees profile or settings</h5>
                        </div>

                        <!--card body start-->
                        <div class="card-body">
                            <div class="row">
                                <!-- Add New Employee Form Start -->

                                <div class="col-lg-6">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" name="fullname" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="repeatPassword">Repeat Your Password</label>
                                            <input type="password" name="repeatPassword" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" name="email" class="form-control" required="required" autocomplete="off">
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" required="required" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" required="required" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0" checked>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="addemployee" class="btn btn-primary btn-flat" value="Register New Employee">
                                    </div>
                                    </form>

                                </div>
                                <!-- Add New Employee Form End -->
                                <?php echo $error; ?>
                            </div>

                        </div>
                        <!--card body End-->


                    </div>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'includes/footer.php';
?>