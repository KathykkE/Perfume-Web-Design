<?php
  session_start();

  if (isset($_SESSION['valid_user']))
  {
    header("Location: cart.php");
  }
  else
  {
    echo "<script>alert('Cannot access shopping cart. Please log in first.');parent.location.href='account.php';</script>";
  }
?>
