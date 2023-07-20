<?php
    if(isset($_GET['did1']))
    {
        $user=$_GET['did1'];
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        $qry="DELETE FROM customer WHERE user='".$user."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('CUSTOMER DETAILS SUCCESSFULLY DELETED')</script>";
            echo '<script>window.location.href="../admin/user.php";</script>';
        }
        else{
            echo"<script>alert('CUSTOMER DETAILS CANNOT BE DELETED')</script>";
        }
    }
    $cn->close();
?>
