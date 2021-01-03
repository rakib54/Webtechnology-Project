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
          <h1 class="m-0 text-dark">Manage All user</h1>
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
              <h5 class="m-0">Manage all Users profile or settings</h5>
            </div>
            <!--card body start-->
            <div class="card-body">

              <!--table start-->
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">SL.</th>
                    
                    <th scope="col">Fullname</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                    <th scope="col">Action</th>
                    
                </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM users";
                  $all_employee = mysqli_query($db, $query);
                  $i = 0;
                  while ($row = mysqli_fetch_assoc($all_employee)) {

                    $users_id     = $row['user_id'];
                    $fullname     = $row['fullname'];
                    $username     = $row['username'];
                    $password     = $row['password'];
                    
                    $i++;
                  ?>
                    <!--All employees Table Start-->
                    <tr>
                      <th scope="row"><?php echo $i; ?>
                      </th>
                      <td><?php echo $fullname; ?> </td>
                      <td><?php echo $username; ?></td>
                      <td><?php echo $password; ?></td>
                    
                      



                      <td>
                        <ul class="nav-users">
                          <li data-toggle="tooltip" data-placement="bottom" title="View">
                            <a href="#">
                              <i class="fas fa-eye"></i>
                            </a>
                          </li>
                          <li data-toggle="tooltip" data-placement="bottom" title="Edit">
                            <a href="updateuser.php?update=<?php echo $users_id  ; ?>">
                              <i class="fas fa-edit"></i>
                            </a>
                          </li>
                          <li data-toggle="tooltip" data-placement="bottom" title="Delete">
                            <a href="user.php?delete=<?php echo $users_id; ?>">
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

                  $query="DELETE FROM users WHERE user_id= '$delete_employee'";

                  $delete_the_employee= mysqli_query($db, $query);

                  if (!$delete_the_employee) {
                    die("Query Failed " .mysqli_error($db));
                 } else {
                    header("Location: user.php");
                }
                }
              ?>

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