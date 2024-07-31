<?php

if(isset($_GET['uid']))
{
    $uid1=$_GET['uid'];
}
include '../con_db.php';
       // $qry="SELECT * FROM order1 ";

        $qry = "SELECT * from order1 WHERE orderid=".$uid1;
        $rslt=$cn->query($qry);
        if($rslt->num_rows >0)
        {
            //echo"HELLO";
            $qry="UPDATE order1 set st='Prepared' where orderid=".$uid1;
            $rslt=$cn->query($qry);
            echo"HELLO";
            echo $rslt;
                if($rslt)
                {
                    
                   // echo"<script>alert('ORDER STATUS HAS BEEN UPDATED TO NO PREPARED!!!');</script>";
                    header('location:status.php');
                }
     }
        else
        {
            echo "Error in".$qry."<br>".$cn->error;
           // echo"<script>alert('Order with mentioned order id doesn't exists!!!');</script>";
        }
    $cn->close();
?>