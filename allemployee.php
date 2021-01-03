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

              <!--table start-->
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">SL.</th>
                    <th scope="col">Avator</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM employees";
                  $all_employee = mysqli_query($db, $query);
                  $i = 0;
                  while ($row = mysqli_fetch_assoc($all_employee)) {

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
                    $i++;
                  ?>
                    <!--All employees Table Start-->
                    <tr>
                      <th scope="row"><?php echo $i; ?>
                      </th>
                      <td>
                        <?php
                        if ($image == NULL) { ?>

                          <img src="images/default.png<?php $image; ?>" width="30" height="30">
                        <?php
                        } else { ?>
                          <img src="images/<?php echo $image; ?>" width="30" height="30">

                        <?php }

                        ?>

                      </td>
                      <td><?php echo $fullname; ?> </td>
                      <td><?php echo $username; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php if ($status == 0) {
                            echo '<div class= "badge badge-danger">Inactive</div>';
                          } else {
                            echo '<div class="badge badge-primary">Active</div>';
                          }
                          ?>
                      </td>



                      <td>
                        <ul class="nav-users">
                          <li data-toggle="tooltip" data-placement="bottom" title="View">
                            <a href="#">
                              <i class="fas fa-eye"></i>
                            </a>
                          </li>
                          <li data-toggle="tooltip" data-placement="bottom" title="Edit">
                            <a href="updateemployee.php?update=<?php echo $employee_id; ?>">
                              <i class="fas fa-edit"></i>
                            </a>
                          </li>
                          <li data-toggle="tooltip" data-placement="bottom" title="Delete">
                            <a href="allemployee.php?delete=<?php echo $employee_id ; ?>">
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

              <?php
                if (isset($_GET['delete'])) {
                  $delete_employee= $_GET['delete'];

                  $query="DELETE FROM employees WHERE employee_id= '$delete_employee'";

                  $delete_the_employee= mysqli_query($db, $query);

                  if (!$delete_the_employee) {
                    die("Query Failed " .mysqli_error($db));
                 } else {
                    header("Location: allemployee.php");
                }
                }
              ?>

            </div>
            <!--card body End-->
            <div class="">
              <a href="addemployee.php" class="btn btn-primary btn-flat pull-right"> Add new Employee</a>
            </div>


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