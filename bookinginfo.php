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
                    <h1 class="m-0 text-dark">Manage All Bookings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">All Booking Info</li>
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
                            <h5 class="m-0">Manage all Bookings</h5>
                        </div>
                        <!--card body start-->
                        <div class="card-body">

                            <!--table start-->
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">SL.</th>
                                        <th scope="col">Event Name</th>
                                        <th scope="col">Event date</th>
                                        <th scope="col">Event time</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">Phone number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">massege</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $host       = "localhost";
                                    $dbUsername = "root";
                                    $dbPassword = "";
                                    $dbname     = "rakib";

                                    $query = "SELECT * FROM booking";
                                    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($conn)) {
                                        $users_id     = $row['user_id'];
                                        $names        = $row['name'];
                                        $date         = $row['date'];
                                        $time         = $row['time'];
                                        $budget       = $row['budget'];
                                        
                                        $i++;
                                    ?>
                                       
                                            </td>
                                            <td><?php echo $users_id ; ?> </td>
                                            <td><?php echo $names; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $time; ?></td>
                                            <td><?php echo $budget; ?></td>
                                            

                                            <td>
                                                <ul class="nav-users">
                                                    <li data-toggle="tooltip" data-placement="bottom" title="View">
                                                        <a href="#">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    
                                                    <li data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                        <a href="allemployee.php?delete=<?php echo $employee_id; ?>">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <!--All employees Table End-->

                                    <?php }

                                    ?>

                                </tbody>
                            </table>
                            <!--table End-->

                           

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