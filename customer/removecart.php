<?php
    if(isset($_GET['iid']))
    {
        $iid=$_GET['iid'];
        // echo $iid;
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        $qry="DELETE FROM cart WHERE iid='".$iid."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('ITEM DETAILS SUCCESSFULLY REMOVED FROM CART')</script>";
            echo '<script>window.location.href="../customer/cart.php";</script>';
        }
        else{
            echo"<script>alert('ITEM DETAILS CANNOT BE REMOVED')</script>";
        }
    }
    $cn->close();
?>