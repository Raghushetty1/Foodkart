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
        $qry="DELETE FROM emp WHERE user='".$user."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('EMPLOYEE DETAILS SUCCESSFULLY DELETED')</script>";
            echo '<script>window.location.href="../admin/staff.php";</script>'; 
        }
        else{
            echo"<script>alert('EMPLOYEE DETAILS CANNOT BE DELETED')</script>";
        }
    }
    $cn->close();
?>
