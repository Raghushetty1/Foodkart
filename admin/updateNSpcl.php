<?php

if(isset($_GET['uid']))
{
    $spcl=$_GET['uid'];
}
include '../con_db.php';
        $qry="SELECT * from item ";
        $rslt=$cn->query($qry);
        if($rslt->num_rows >0)
        {
            $qry="UPDATE item SET special='0' where iid='".$spcl."'";
            $rslt=$cn->query($qry);
                if($rslt)
                {
                    //echo"<script>alert('ORDER STATUS HAS BEEN UPDATED TO NO PREPARED!!!');</script>";
                    header('location:item.php');
                }
        }
        else
        {
            echo "Error in".$qry."<br>".$cn->error;
            //echo"<script>alert('Order with mentioned order id doesn't exists!!!');</script>";
        }
    $cn->close();
?>