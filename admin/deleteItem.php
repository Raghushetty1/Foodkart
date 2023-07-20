<?php
    if(isset($_GET['did']))
    {
        $item=$_GET['did'];
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        $qry="DELETE FROM item WHERE iid='".$item."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('Item DETAILS SUCCESSFULLY DELETED')</script>";
            header('location:item.php');
        }
        else{
            echo"<script>alert('CATEGORY DETAILS CANNOT BE DELETED')</script>";
        }
    }
    $cn->close();
?>
