<?php
if(isset($_GET['iid'])&&isset($_GET['qty'])){
    //echo"hii";
    $iid2=$_GET['iid'];
    //echo $iid2;
    $qty=$_GET['qty'];
   
    include "../con_db.php";

    $qry="select * from cart where iid=".$iid2;
    $rslt=$cn->query($qry);
    if($rslt->num_rows!=0){
        $qry1="update cart set qty='.$qty.' where iid=".$iid2;
        $rslt1=$cn->query($qry1);
        if($rslt){
            //echo"<script>alert('$iid2');</script>";
            echo '<script>window.location.href="../customer/cart.php";</script>';
        }
    }
}
