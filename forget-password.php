<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/apple-icon.png">
  <title>
    Recover Password
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>
<body class="index-page">

  <!-- Form -->

  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-5 col-lg-5 m-auto">
        <form action="forget-password.php" method="post" class="card card-body rounded-0 bg-white" style="margin-top:50%;">
          <h1 class="text-dark text-center">Reset Password</h1>
          <div class="form-group">
          <label for="email" class="text-dark">Enter Your Email:</label>
          <input type="email" name="email" class="form-control text-dark rounded-0" required>
        </div>
        <div class="form-group">
          <input type="submit" name="forget" value="RESET PASSWORD" class="btn btn-block btn-success rounded-0">
        </div>
        <div class="form-group">
          <a href="index.php" class="text-primary">LOGIN?</a>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php
    if(isset($_POST['forget'])){
      $passField = $_POST['email'];
      $query = "select * from users where email = '$passField'";
      $run = mysqli_query($connection, $query);
      $check = mysqli_num_rows($run);
      $row = mysqli_fetch_assoc($run);
      $name = $row['username'];
      $password = $row['password'];
      if($check == 1){
        $to = $passField;
        $subject = "Reset Password";
        $txt = "Hello Student! here is your pssword: $password ";
        $headers = "From: support@gcuw.com" . "\r\n" .
        "CC: support@gcuw.com";
        mail($to,$subject,$txt,$headers);
        exit();
      } else {
        echo "<script>alert('Wrong Email Address!!!')</script>";
        exit();
      }
    }
  ?>

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