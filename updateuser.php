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
                    <h1 class="m-0 text-dark">Update users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Update user</li>
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
                            <h5 class="m-0">Update all users profile or settings</h5>
                        </div>

                        <!--card body start-->
                        <div class="card-body">
                            <div class="row">

                                <?php
                                if (isset($_GET['update'])) {
                                    $the_user_id = $_GET['update'];

                                    $query = "SELECT * FROM users WHERE user_id ='$the_user_id'";
                                    $update_employee = mysqli_query($db, $query);

                                    while ($row = mysqli_fetch_assoc($update_employee)) {
                                        $users_id       = $row['user_id'];
                                        $fullname       = $row['fullname'];
                                        $username       = $row['username'];
                                        $password       = $row['password'];
                                        $Retypepassword = $row['retypepassword'];
                                       
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
                                                    <label for="password">password</label>
                                                    <input type="text" name="password" class="form-control" required="required" autocomplete="off" value="<?php echo  $password; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Retypepassword</label>
                                                    <input type="text" name="password" class="form-control" required="required" autocomplete="off" value="<?php echo  $password; ?>">
                                                </div>
                                               
                                            <div class="form-group">
                                                <input type="submit" name="updateuser" class="btn btn-primary btn-flat" value="Update user">
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
                        if (isset($_POST['updateuser'])) {

                            $fullname           = $_POST['fullname'];
                            $username           = $_POST['username'];
                            $password           = $_POST['password'];
                           
                           $query= "UPDATE users SET fullname='$fullname',username = '$username', password= '$password', retypepassword= '$password' WHERE  user_id= '$the_user_id'";
                            $update_user_data= mysqli_query($db, $query);

                            if (!$update_user_data) {
                                die("Query Failed " . mysqli_error($db));
                            } else {
                                header("Location: user.php");
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