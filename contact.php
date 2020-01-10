<?php
  include 'db.php';
  if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $query = "insert into contact_list(fullname,email,subject,msg) values ('$name','$email','$sub','$msg')";
    $run = mysqli_query($connection, $query);
    if($run) {
      echo "<script>alert('Your message has been sent to admin!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      echo "<script>alert('We can't sent your message, try again)</script>";
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
    Support - GCU•
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
    section{
      background: url('assets/img/bg.jpeg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }
    #overlay{
      background:rgba(0,0,0,0.7);
      top:0;
      left:0;
      width:100%;
    }
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
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Go Back</a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="index.php" data-toggle="modal" data-target="#loginModal" class="dropdown-item">Back</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-info d-none d-lg-block" href="index.php">Go Back
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <section style="margin-top:100px">
  <div id="overlay">
    <div class="container py-5">
    <h1 class="text-center"><span style="border-bottom:3px solid #ffffff">Student Support</span></h1>
      <div class="row">
        <div class="col-sm-12 col-md-5 m-auto">
          <form class="bg-light p-3" method="post" action="contact.php">
          <h5 class="text-center text-dark">Please Fill The Form To Ask Any Question!</h5>
            <div class="form-group">
              <label for="name">Full Name•</label>
              <input type="text" name="name" class="form-control text-dark"  required>
            </div>
            <div class="form-group">
              <label for="name">Your Email•</label>
              <input type="email" name="email" class="form-control text-dark"  required>
            </div>
            <div class="form-group">
              <label for="name">Subject•</label>
              <input type="text" name="subject" class="form-control text-dark"  required>
            </div>
            <div class="form-group">
              <label for="name">Message•</label>
              <textarea name="message" class="form-control text-dark"  required></textarea>
            </div>
            <input name="send" type="submit" class="btn btn-outline-success btn-block">
          </form>
        </div>
      </div>
    </div>
    </div>
  </section>

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
  <footer style="background:#000000;color:#ffffff;">
    <p class="text-center py-3">
      &copy; Copyright 2019 - All rights reserved
    </p>
  </footer>
  </div>

  <!-- Modals -->
  <!-- Modals Ends -->

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