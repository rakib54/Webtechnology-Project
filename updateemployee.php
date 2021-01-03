<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/leftsidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update All Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Update Employee</li>
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
                            <h5 class="m-0">Update all Employees profile or settings</h5>
                        </div>

                        <!--card body start-->
                        <div class="card-body">
                            <div class="row">

                                <?php
                                if (isset($_GET['update'])) {
                                    $the_employee_id = $_GET['update'];

                                    $query = "SELECT * FROM employees WHERE employee_id ='$the_employee_id'";
                                    $update_employee = mysqli_query($db, $query);

                                    while ($row = mysqli_fetch_assoc($update_employee)) {
                                        $employee_id  = $row['employee_id'];
                                        $fullname     = $row['fullname'];
                                        $username     = $row['username'];
                                        $password     = $row['password'];
                                        $email        = $row['email'];
                                        $phone        = $row['phone'];
                                        $address      = $row['address'];
                                        $joindate     = $row['joindate'];
                                        $status       = $row['status'];
                                        $user_role    = $row['user_role'];
                                        $image        = $row['image'];

                                ?>

                                        <!-- Add New Employee Form Start -->
                                        <div class="col-lg-6">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <input type="text" name="fullname" class="form-control" required="required" autocomplete="off" value="<?php echo  $fullname; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" class="form-control" required="required" autocomplete="off" value="<?php echo  $username; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email" class="form-control" required="required" autocomplete="off" value="<?php echo   $email; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" class="form-control" required="required" autocomplete="off" value="<?php echo  $phone; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address" class="form-control" required="required" autocomplete="off" value="<?php echo   $address; ?>">
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
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
                                                <br>
                                                <?php

                                                if ($image == NULL) { ?>
                                                    <img src="images/default.png<?php $image; ?>" width="75" height="75">
                                                <?php
                                                } else { ?>
                                                    <img src="images/<?php echo $image; ?>" width="75" height="75">
                                                <?php }
                                                ?>
                                                <br>
                                                <br>

                                                <input type="file" name="image" class="form-control-file">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="updateemployee" class="btn btn-primary btn-flat" value="Update Employee">
                                            </div>
                                            </form>
                                        </div>
                                <?php }
                                }

                                ?>

                            </div>

                        </div>
                        <!--card body End-->

                        <?php
                        if (isset($_POST['updateemployee'])) {

                            $fullname           = $_POST['fullname'];
                            $username           = $_POST['username'];
                            $email              = $_POST['email'];
                            $phone              = $_POST['phone'];
                            $address            = $_POST['address'];
                            $status             = $_POST['status'];

                            $employee_image       = $_FILES['image']['name'];
                            $employee_image_temp  = $_FILES['image']['tmp_name'];
                            move_uploaded_file($employee_image_temp, "images/$employee_image");

                            if (empty($employee_image)) {
                                $query= "UPDATE employees SET fullname='$fullname',username = '$username', email= '$email', phone ='$phone', 
                                address= '$address', status=  '$status' WHERE  employee_id= '$the_employee_id'";

                                $update_employee_data= mysqli_query($db, $query);
                                if (!$update_employee_data) {
                                    die("Query Failed " . mysqli_error($db));
                                } else {
                                    header("Location: allemployee.php");
                                }
                                 
                            }else{

                            $query= "UPDATE employees SET fullname='$fullname',username = '$username', email= '$email', phone ='$phone', address= '$address', status=  '$status', image ='$employee_image' WHERE  employee_id= '$the_employee_id'";
                            $update_employee_data= mysqli_query($db, $query);

                            if (!$update_employee_data) {
                                die("Query Failed " . mysqli_error($db));
                            } else {
                                header("Location: allemployee.php");
                            }
                             
                            }
                           
                        }

                        ?>


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