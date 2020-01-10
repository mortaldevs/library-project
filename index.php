<?php 
include 'db.php';
session_start();
?>
<?php
  # Login Script
  if(isset($_POST['login']))
  {
    $email = $_SESSION['email'] = $_POST['email'];
    $password = $_POST['password'];
    $loginQuery = "select * from users where email='$email' && password='$password'";
    $runQuery = mysqli_query($connection, $loginQuery) or die(mysqli_error($connection));
    $row = mysqli_fetch_array($runQuery);
    $checkValues = mysqli_num_rows($runQuery);
    $_SESSION['id']=$row['user_id'];
    $_SESSION['Email']=$row['email'];
    if($checkValues == 1)
    {
      echo "<script>window.open('student-membership/index.php','_self')</script>";
    } else {
      echo "<script>alert('Incorrect Details')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/apple-icon.png">
  <title>
    GCU - Library Management System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <link href="./assets/demo/demo.css" rel="stylesheet" />

  <style>
    #dropdown_menu{
      display:none;
    }
    @media(max-width:768px){
      #dropdown_menu{
        display:block !important;
      }
    }
    @media(max-width:370px){
      #dropdown_menu{
        display:block !important;
      }
    }
  </style>
</head>
<body class="index-page">
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php" rel="tooltip">
          <span>GCU•</span> Library System
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                GCU•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/"
              target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/"
              target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/"
              target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
          <li class="dropdown nav-item" id="dropdown_menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Getting started</a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" data-toggle="modal" data-target="#loginModal" class="dropdown-item">Sign In</a>
              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#signupModal">New Member</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-info d-none d-lg-block" href="#" data-toggle="modal" data-target="#loginModal">Member Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-success d-none d-lg-block" href="#" data-toggle="modal" data-target="#signupModal"> New Member
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header header-filter">
    <div class="squares square1"></div>
    <div class="squares square2"></div>
    <div class="squares square3"></div>
    <div class="squares square4"></div>
    <div class="squares square5"></div>
    <div class="squares square6"></div>
    <div class="squares square7"></div>
    <div class="container">
      <div class="content-center brand">
        <h1 class="h1-seo">Search Your Book•</h1>
        <form action="index.php" method="get">
          <div class="form-group">
            <input type="search" name="main_search" class="form-control form-control-lg bg-light text-dark" placeholder="Book Name OR Author Name" required>
          </div>
          <input type="submit" name="search" value="Search Book" class="btn btn-success btn-block">
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php
        if(isset($_GET['search'])){
          $fieldValue = $_GET['main_search'];
          $matchQuery = "select * from books where book_name = '$fieldValue' || author_name = '$fieldValue'";
          $runQuery = mysqli_query($connection, $matchQuery);
          while($row = mysqli_fetch_assoc($runQuery)){
            $image = $row['img'];
            $title = $row['book_name'];
            $author = $row['author_name'];
            echo "<div class='col-sm-12 col-md-3'>
                    <div class='card'>
                      <img src='admin/assets/TOC/$image' class='card-img-top w-100' style='height:150px !important;' />
                      <div class='card-body'>
                        <h4 class='card-title'>$title</h4>
                        <p class='lead'>Written by: $author</p>
                      </div>
                    </div>
                  </div>
            ";
          }
        }
      ?>
    </div>
  </div>
  
  <div class="main">
    <div class="container">
      <h1 class="h1-seo text-center"><span style="border-bottom:3px solid #ffffff">Available Department Books•</span></h1>

      <!-- Cards -->
      <div class="row mt-5">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Botany</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Chemistry</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Computer Science</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Food Science</h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Home Economics</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Fashion Designing</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">IT</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Mathematics</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Physics</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Zoology</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Statistics</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Bio Chemistry</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Psychology</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Economics</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">BE.d Hons (El)</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Physical Education</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">English</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Political Science</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Fine Arts</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Sociology</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">BBA</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Commerce</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Public Administration</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Arabic</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Islamic Studies</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Urdu</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h4 class="text-center text-dark">Education Degree</h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="card card-body bg-light">
            <h5 class="text-center text-dark" style="font-size:15px; ">Human Nutrition & Dietetic</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Starts -->
    <div class="bg-dark text-light">
    <div class="container">
      <div class="row py-5">
        <div class="col-sm-12 col-md-4 col-lg-4">
          <h1 class="text-center"><span>About GCU•</span></h1>
          <p class=" text-center text-muted">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis maxime quasi sapiente et quisquam, unde voluptatem magni molestiae in iure.
          </p>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <h1 class="text-center"><span>Quick Links•</span></h1>
          <ul class="text-center" style="list-style:none;">
            <li>
              <a href="index.php" class="text-muted">Home</a>
            </li>
            <li>
              <a href="#" class="text-muted" data-toggle="modal" data-target="#signupModal">Membership</a>
            </li>
            <li>
              <a href="contact.php" class="text-muted">Contact</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <h1 class="text-center"><span>Contact Us•</span></h1>
          <p class="text-muted text-center">
            Government College University For Women,
            <br>MAdina Town,
            <br>Faisalabad Pakistan
          </p>
        </div>
      </div>
    </div>
  </div>
  <footer style="background:#000000;color:#ffffff;">
    <p class="text-center py-3">
      &copy; Copyright 2019 - All rights reserved
    </p>
  </footer>

  <!-- Modals -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <button class="close" data-dismiss="modal">&times;</button>
              <h3 class="text-center text-dark">Please Login!</h3>
              <form method="post" action="index.php">
                <div class="form-group">
                  <label for="email">Your Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control text-dark" name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <label for="pass">Type Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control text-dark" name="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                  <a href="forget-password.php" class="text-info pull-right">Forget Password?</a>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
              <button class="btn btn-success" type="submit" name="login">Login</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- Login Modal ends -->

    <!-- Membership Modal -->
    <div class="modal fade" id="signupModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3 class="text-center text-dark">Please complete the form to continue</h3>
            <form method="post" action="index.php">
              <div class="row">
                <div class="col">
                  <label for="name">Your Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="name" placeholder="Enter Name" required>
                </div>
                <div class="col">
                  <label for="name">Father Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="fatherName" placeholder="Father Name" required>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <label for="name">Registration Number <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="regnumber" placeholder="Registration Number" required>
                </div>
                <div class="col">
                  <label for="name">Roll Number <span class="text-danger">*</span></label>
                  <input type="number" class="form-control form-control-sm text-dark" name="roll" placeholder="Roll Number" required>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="name">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control form-control-sm text-dark" name="emailAddress" placeholder="Enter Email" required>
                </div>
                <div class="col">
                  <label for="name">CNIC Number <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="cnic" placeholder="CNIC Number" required>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="name">Department <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="department" placeholder="Department Name" required>
                </div>
                <div class="col">
                  <label for="name">Semester <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm text-dark" name="semester" placeholder="Current Semester" required>
                </div>
              </div>
              <div class="form-group">
                <label for="pass">Generate a Password</label>
                <input type="password" class="form-control form-control-sm text-dark" name="password" placeholder="Type Password" required>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="signup">Create Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Membership Modal ends -->
  <!-- Modals Ends -->
  <!-- Footer Ends -->
  <!-- Modals -->
  <!-- Modals ends -->
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script>
    $(document).ready(function () {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>
</html>

<?php
  # Signup Script...
  if(isset($_POST['signup']))
  {
    $userName = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $reg = $_POST['regnumber'];
    $roll = $_POST['roll'];
    $email = $_POST['emailAddress'];
    $cnic = $_POST['cnic'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];
    if(strlen($password) < 8){
      echo "<script>alert('Password must be at least 8 characters!')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
      exit();
    }
    $checkEmail = "select * from users where email='$email'";
    $runEmailQuery = mysqli_query($connection, $checkEmail);
    $count = mysqli_num_rows($runEmailQuery);
    if($count == 1){
      echo "<script>alert('Email already exists')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
    $registerQuery = "insert into users
                      (username, fathername, registration, roll, email, cnic, department, semester, password)
                      values
                      ('$userName', '$fatherName', '$reg', '$roll', '$email', '$cnic', '$department', '$semester', '$password')";
    $runQuery = mysqli_query($connection, $registerQuery) or die(mysqli_error($connection));
    if( $runQuery )
    {
      echo "<script>alert('You have successfully done Registration process. But Your status is currently pending for registeration')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      echo "<script>alert('Something went wrong! Please try again later')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}
?>