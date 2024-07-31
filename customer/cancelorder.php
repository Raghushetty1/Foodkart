<?php
    if(isset($_GET['did']))
    {
        $user=$_GET['did'];
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        $qry="DELETE FROM order1 WHERE iid='".$user."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('Order successfully cancelled!!!')</script>";
            echo '<script>window.location.href="../customer/pendingorder.php";</script>'; 
        }
        else{
            echo"<script>alert('Error in cancelling order!!!')</script>";
        }
    }
    $cn->close();
?>
