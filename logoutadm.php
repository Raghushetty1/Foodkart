<?php
  echo "<script>alert('Successfully logged out!!!');</script>";
 unset($_SESSION['admin']);
 echo '<script>window.location.href="../Foodkart/login.php";</script>';
 ?>