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
          <li class="nav-item active">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">New Request</a>
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
    <div class="header bg-gradient-primary pt-md-8 pb-3">
      <div class="container-fluid">
        <div class="header-body">
        <h2 class="text-white text-center">Request for Book Issue</h2>
          <!-- Card stats -->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <?php
      $reference = $_GET['book_id'];
      $getBookData = "select * from books where book_id = '$reference'";
      $runThis = mysqli_query($connection, $getBookData);
      while($row = mysqli_fetch_assoc($runThis)){
        $ID = $row['book_id'];
        $bookname = $row['book_name'];
        $bookauthor = $row['author_name'];
        $department = $row['department'];
        $semester = $row['semester'];
      }
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 m-auto">
            <form action="newrequest.php" method="post">
                <div class="form-group">
                    <label for="book name">Roll#:</label>
                    <input type="text" name="roll" class="form-control" placeholder="Your Roll Number" required>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="book name">Department:</label>
                        <input type="text" value="<?= $department ?>" name="department" class="form-control" placeholder="Your Department" required>
                    </div>
                    <div class="col form-group">
                        <label for="book name">Semester:</label>
                        <input type="text" value="<?= $semester ?>" name="semester" class="form-control" placeholder="Your Semester" required>
                    </div>
                </div>
                <div class="row">
                <div class="col form-group">
                    <label for="book name">Book Name:</label>
                    <input type="text" value="<?= $bookname ?>" name="bookName" class="form-control" placeholder="Book Name" required>
                </div>
                <div class="col form-group">
                    <label for="book name">Author Name: (optional)</label>
                    <input type="text" value="<?= $bookauthor ?>" name="authorName" class="form-control" placeholder="Author Name">
                </div>
                </div>
                <div class="row">
                <div class="col form-group">
                    <label for="book name">From:</label>
                    <input type="date" name="start" class="form-control" required>
                </div>
                <div class="col form-group">
                    <label for="book name">To:</label>
                    <input type="date" name="end" class="form-control" required>
                </div>
                </div>
                <input type="submit" value="Send Request" class="btn btn-success btn-block" name="send">
            </form>
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

<?php
    if(isset($_POST['send']))
    {
        $user_id = $_SESSION['id'];
        $roll = $_POST['roll'];
        $dep = $_POST['department'];
        $sem = $_POST['semester'];
        $bname = $_POST['bookName'];
        $aname = $_POST['authorName'];
        $st = $_POST['start'];
        $en = $_POST['end'];
        $req_status = "Pending";

        $insert = "insert into book_requests(user_id,rollnumber,department,semester,bookname,authorname,startdate,enddate,request_status)
                    values('$user_id','$roll','$dep','$sem','$bname','$aname','$st','$en','$req_status')";
        $run = mysqli_query($connection, $insert);
        if($run){
            echo "<script>alert('Your Request has been successfully sent to admin')</script>";
            echo "<script>window.open('newrequest.php','_self')</script>";
        } else {
            echo "<script>alert('Something went wrong, please try again...')</script>";
            echo "<script>window.open('newrequest.php','_self')</script>";
        }
    }
?>