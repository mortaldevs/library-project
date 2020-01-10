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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newrequest.php">
              <i class="ni ni-books"></i> Request New Book
            </a>
          </li>
          <li class="nav-item">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <h1 class="text-center text-white" style="font-size:50px;font-family:roboto;">Search Your Book!</h1>
              <form action="index.php" method="get">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="search" name="book-name" class="form-control form-control-lg" placeholder="Book Name | Author Name" style="border-radius:0px;background:transparent;border:none;border-bottom:1px solid #ffffff;padding:0px;;color:#ffffff;font-size:20px;" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-outline-white btn-block" name="search" value="SEARCH">
                    </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-5">
          <h1 class="text-center" style="font-size:45px;font-family:roboto;">Results!</h1>
          <div class="row">
          <?php
            if(isset($_GET['search']))
            {
              $required_book = $_GET['book-name'];
              $getBookData = "select * from books where book_name = '$required_book' || author_name = '$required_book'";
              $runQuery = mysqli_query($connection, $getBookData);
              while($row = mysqli_fetch_array($runQuery))
              {
                $bid = $row['book_id'];
                $bname = $row['book_name'];
                $author = $row['author_name'];
                $dept = $row['department'];
                $semester = $row['semester'];
                $isbn = $row['ibn'];
                $rack = $row['rack'];
                $image = $row['img'];

                echo "<div class='col-md-3 col-lg-3'>
                            <div class='card bg-primary'>
                              <img src='../admin/assets/TOC/$image' class='card-img-top' id='card-image'>
                              <div class='card-body text-light'>
                                <h3 class='card-title text-light text-center'>$bname</h3>
                                <p class='text-light'>Written By: $author</p>
                                <p class='text-light'>Department: $dept</p>
                                <p class='text-light'>Semester: $semester</p>
                                <p class='text-light'>Rack#: $rack</p>
                                <a href='newrequest.php?book_id=$bid' id='status' class='btn btn-success btn-block'>Request Book</a>
                                </div>
                            </div>
                          </div>";
              }
            }
          ?>
          </div>
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