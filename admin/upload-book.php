<?php 
  include '../db.php'; 
  session_start();
  if(!$_SESSION['email']){
    header('location: logout.php');
  }

  if(isset($_POST['upload']))
  {
    $bookName = $_POST['book_name'];
    $authorName = $_POST['author_name'];
    $dept = $_POST['dept_name'];
    $semester = $_POST['semester'];
    $ibn = $_POST['ibn'];
    $rack = $_POST['rack'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempImage, "assets/TOC/$image");

    $insertData = "insert into books (book_name,author_name,ibn,rack,img,department,semester) values ('$bookName', '$authorName', '$ibn', '$rack', '$image','$dept','$semester')";
    $run = mysqli_query($connection, $insertData);
    if($run){
      echo "<script>alert('Book Uploaded Successfully!')</script>";
      echo "<script>window.open('upload-book.php','_self')</script>";
    } else {
      echo "<script>alert('Something went wrong!')</script>";
      echo "<script>alert('upload-book.php','_self')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/apple-icon.png">
  <title>
    Add New Book
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    .sidebar-wrapper{
      background: #247CF7 !important;
    }
    .list-group-item{
      color:#333333;
    }
    #new-records{
      background: #27293D;
      border-radius: 5px;
    }
  </style>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            GCU
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Admin Panel
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="upload-book.php">
              <i class="tim-icons icon-cloud-upload-94"></i>
              <p>Upload Book</p>
            </a>
          </li>
          <li>
            <a href="library.php">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>Library</p>
            </a>
          </li>
          <li>
            <a href="requests.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Students Requests</p>
            </a>
          </li>
          <li>
            <a href="members.php">
              <i class="tim-icons icon-single-02"></i>
              <p>All Members</p>
            </a>
          </li>
          <li>
            <a href="contacts.php">
              <i class="tim-icons icon-email-85"></i>
              <p>Support Contacts</p>
            </a>
          </li>
          <li>
            <a href="profile.php">
              <i class="tim-icons icon-satisfied"></i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="tim-icons icon-button-power"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Profile
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="profile.php" class="nav-item dropdown-item">Profile Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="logout.php" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->

      <!-- Content starts -->
      <div class="content">
        <h2 class="text-white text-center">Upload New Book!</h2>
        <div class="row">
          <div class="col-sm-12 col-md-8 col-lg-8 m-auto">
            <form class="card card-body" action="upload-book.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col">
                  <label for="book name">Book Name:</label>
                  <input type="text" name="book_name" class="form-control" placeholder="Book Name" required>
                </div>
                <div class="col">
                  <label for="book name">Author Name:</label>
                  <input type="text" name="author_name" class="form-control" placeholder="Author Name" required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="book name">Department Name:</label>
                  <input type="text" name="dept_name" class="form-control" placeholder="Department Name" required>
                </div>
                <div class="col">
                  <label for="book name">Semester:</label>
                  <input type="text" name="semester" class="form-control" placeholder="semester" required>
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <label for="ibn#">ISBN #</label>
                  <input type="text" name="ibn" class="form-control" placeholder="Book ISBN #" required>
                </div>
                <div class="col form-group">
                  <label for="rack#">Rack #</label>
                  <input type="text" name="rack" class="form-control" placeholder="Book Rack #" required>
                </div>
              </div>
                <div class="form-group">
                  <label for="rack#">Table of Content Image</label><br>
                  <input type="file" name="image" class="form-control" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])" required>
				  <img src="assets/img/use.png" id="blah1" class="img-thumbnail" width="150" height="300">
                </div>
                <input type="submit" name="upload" value="UPLOAD BOOK" class="btn btn-block btn-info">
            </form>
          </div>
        </div>
      </div>

<!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>