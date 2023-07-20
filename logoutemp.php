<?php
  echo "<script>alert('Successfully logged out!!!');</script>";
 unset($_SESSION['user']);
 echo '<script>window.location.href="../Foodkart/logine.php";</script>';
 ?>