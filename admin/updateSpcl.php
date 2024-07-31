<?php

if(isset($_GET['uid']))
{
    $spcl=$_GET['uid'];
}
include '../con_db.php';
        $qry="SELECT * from item where special=1 ";
        $rslt=$cn->query($qry);
        if($rslt->num_rows <=2)
        {
            
            $qry="UPDATE item SET special='1' where iid='".$spcl."'";
            $rslt=$cn->query($qry);
                if($rslt)
                {
                    //echo"<script>alert('ORDER STATUS HAS BEEN UPDATED TO NO PREPARED!!!');</script>";
                    header('location:item.php');
                }
        }
        else
        {
            
            echo"<script>alert('THREE SPECIAL ITEMS ARE ALREADY DISPLAYED!!!');</script>";
            echo '<script>window.location.href="../admin/item.php";</script>';  

        }
    $cn->close();
