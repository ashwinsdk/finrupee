<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "func.php";
//DB-Connection
connect();
//View
view();
//Delete
delete();
//Disapprove
approve();
//Approve
disapprove();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EDIT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Student-Portal</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle"></i>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        
        <!-- Left side columns -->
        <div class="col-mb-10">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h2 class="card-title">Students Details</h2>
                <!-- Table with stripped rows -->
                <div class="table-responsive">
                 <table class="table table-striped ">
                 
                     <tr class="text-center">
                       <th>Profile</th>
                       <td><img src="assets/img/profile.png" class="img-thumbnail" alt="Profile"></td>
                     </tr>
                   
                     <tr class="text-center">
                       <th>Name</th>
                       <td><?php echo $_SESSION['user_name'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Email</th>
                       <td><?php echo $_SESSION['email'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Father's Name</th>
                       <td><?php echo $_SESSION['father'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Mother's Name</th>
                       <td><?php echo $_SESSION['mother'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Mobile Number</th>
                       <td><?php echo $_SESSION['mobile'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Kulam</th>
                       <td><?php echo $_SESSION['kulam'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Kovil</th>
                       <td><?php echo $_SESSION['kovil'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Pincode</th>
                       <td><?php echo $_SESSION['pincode'] ?></td>
                      </tr>
                 </table>
                </div>

                <h2 class="card-title">Action</h2>
                <div class="table-responsive">
                 <table class="table table-hover ">
                     <tr class="text-center">
                       <th>Status</th>
                       <td><?php echo $_SESSION['status'] ?></td>
                      </tr>
                     <tr class="text-center">
                       <th>Action</th>
                       <td>
                          <form method="POST" action="">
                           <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <input type="submit" name="approve" class="btn btn-outline-success " value="Approve">
                            <input type="submit" name="disapprove" class="btn btn-outline-secondary " value="Disapprove">
                            <input type="submit" name="delete" class="btn btn-outline-danger " value="Delete">
                           </div>
                          </form>
                       </td>
                      </tr>
                 </table>
                </div>

                <!-- End Table with stripped rows -->
              </div>
           </div>


          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>