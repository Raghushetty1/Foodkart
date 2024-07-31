<?php

if(isset($_GET['uid']))
{
    $order1=$_GET['uid'];
}
include '../con_db.php';
        $qry="SELECT * from order1 ";
        $rslt=$cn->query($qry);
        if($rslt->num_rows >0)
        {
            $qry="UPDATE order1 SET st='Not Prepared' where orderid=".$order1;
            $rslt=$cn->query($qry);
                if($rslt)
                {
                    echo"<script>alert('ORDER STATUS HAS BEEN UPDATED TO NO PREPARED!!!');</script>";
                    header('location:status.php');
                }
        }
        else
        {
            echo "Error in".$qry."<br>".$cn->error;
            //echo"<script>alert('Order with mentioned order id doesn't exists!!!');</script>";
        }
    $cn->close();
?>