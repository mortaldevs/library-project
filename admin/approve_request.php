<?php 
  include '../db.php'; 

  $reference = $_GET['reference_id'];
  $query = "update book_requests set request_status='Approved' where user_id='$reference'";
  $run = mysqli_query($connection, $query);
  if($run){
      echo "<script>window.open('requests.php', '_self')</script>";
  } else {
      echo "<script>window.open('Something went wrong!')</script>";
      echo "<script>window.open('requests.php', '_self')</script>";
  }
?>