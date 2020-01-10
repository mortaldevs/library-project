<?php
  include '../db.php';
  session_start();
  if(!$_SESSION['email']){
    header('location: ../index.php?logout=true');
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Student Membership - Dashboard</title>
  <!-- Favicon -->
  <link href="assets/img/apple-icon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <script>
    $(document).ready(function(){
      if($('#status1').text('NOT AVAILABLE')){
        $('#status').prop('disabled', true);
      } else {
        $('#status').removeAttr('disabled');
      }
    });
  </script>
  <style>
    #card-image{
      width:100%;
      height:200px;
    }
  </style>
</head>

<body class="bg-light">
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <h1>
      <a class="navbar-brand pt-0" href="./index.html">
        <!-- <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
        Welcome!
      </a></h1>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <!-- <a href="profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-button-power"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <h1><a href="index.php">
                <!-- <img src="./assets/img/brand/blue.png"> -->
              </a>
              Welcome! 
              </h1>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newrequest.php">
              <i class="ni ni-books"></i> Request New Book
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="requests.php">
              <i class="ni ni-collection"></i> My requests
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="ni ni-button-power"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">All Requests</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                <?php 
                  $user_id = $_SESSION['id'];
                  $query = "select * from users where user_id='$user_id'";
                  $runQuery1 = mysqli_query($connection, $query);
                  while($getname = mysqli_fetch_assoc($runQuery1)){
                    $name = $getname['username'];
                ?>
                  <span class="mb-0 text-sm  font-weight-bold"><?= $name; ?></span>
                  <?php } ?>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <!-- <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-button-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-3 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
            <h2 class="text-white text-center">All Requests</h2>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <?php
                    $user_id = $_SESSION['id'];
                    $getData = "select * from book_requests where user_id='$user_id'";
                    $run = mysqli_query($connection, $getData);
                    while($fetch = mysqli_fetch_assoc($run))
                    {
                        $book = $fetch['bookname'];
                        $author =$fetch['authorname'];
                        $department = $fetch['department'];
                        $semester = $fetch['semester'];
                        $fromdate = $fetch['startdate'];
                        $todate = $fetch['enddate'];
                        $req_status = $fetch['request_status'];
                    
                ?>
                <tbody>
                    <tr>
                        <td><?= $book ?></td>
                        <td><?= $author ?></td>
                        <td><?= $department ?></td>
                        <td><?= $semester ?></td>
                        <td><?= $fromdate ?></td>
                        <td><?= $todate ?></td>
                        <td><span class="bg-warning text-light p-1"><?= $req_status ?></span></td>
                    </tr>
                </tbody>
            </table>
                    <?php } ?>
        </div>
      </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</body>
</html>