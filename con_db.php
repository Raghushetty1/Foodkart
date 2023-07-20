<?php
    @$cn=mysqli_connect('localhost','root','','foodkart');
    if($cn->connect_error)
    {
        echo"<script>alert('DB_connection failed!!!');</script>";
        exit;   
    }
?>