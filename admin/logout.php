<?php
  session_start();
  session_destroy();
 
  echo "<script>alert('Do you Wish to Logout');window.location.href='login.php';</script>";
  exit;
?>