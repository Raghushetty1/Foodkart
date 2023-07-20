<?php
    if(isset($_GET['did']))
    {
        $cat=$_GET['did'];
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        $qry="DELETE FROM category WHERE cat_id='".$cat."'";
        $rslt=$cn->query($qry);
        if($rslt)
        {
            echo"<script>alert('CATEGORY DETAILS SUCCESSFULLY DELETED')</script>";
            header('location:category.php');
        }
        else{
            echo"<script>alert('CATEGORY DETAILS CANNOT BE DELETED')</script>";
        }
    }
    $cn->close();
?>
