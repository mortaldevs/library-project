<?php 
  include '../db.php'; 

  $reference = $_GET['reference_id'];
  $query = "delete from book_requests where user_id='$reference'";
  $run = mysqli_query($connection, $query);
  if($run){
      echo "<script>window.open('requests.php', '_self')</script>";
  } else {
      echo "<script>window.open('Something went wrong!')</script>";
      echo "<script>window.open('requests.php', '_self')</script>";
  }
?>