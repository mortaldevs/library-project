<?php 
  include '../db.php'; 

  $reference = $_GET['book'];
  $query = "delete from books where book_id='$reference'";
  $run = mysqli_query($connection, $query);
  if($run){
      echo "<script>window.open('library.php', '_self')</script>";
  } else {
      echo "<script>window.open('Something went wrong!')</script>";
      echo "<script>window.open('library.php', '_self')</script>";
  }
?>