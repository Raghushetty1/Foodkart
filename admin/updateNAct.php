<?php

if(isset($_GET['uid']))
{
    $active=$_GET['uid'];
}
include '../con_db.php';
        $qry="SELECT * from category ";
        $rslt=$cn->query($qry);
        if($rslt->num_rows >0)
        {
            $qry="UPDATE category SET active='0' where cat_id='".$active."'";
            $rslt=$cn->query($qry);
                if($rslt)
                {
                    //echo"<script>alert('ORDER STATUS HAS BEEN UPDATED TO NO PREPARED!!!');</script>";
                    header('location:category.php');
                }
        }
        else
        {
            echo "Error in".$qry."<br>".$cn->error;
            //echo"<script>alert('Order with mentioned order id doesn't exists!!!');</script>";
        }
    $cn->close();
?>