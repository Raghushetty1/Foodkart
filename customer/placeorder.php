
<?php 
   $cn = mysqli_connect('localhost', 'root', '', 'foodkart');
   $result = $cn->query("SELECT * FROM `cart`");
// $qry="SELECT * FROM cart";
// $rslt=$cn->query($qry);
//$rslt=$cn->query("SELECT * FROM `cart`");
$grandtotal=0;
//print_r($rslt);
if($result->num_rows!=0){

while($r=$result->fetch_assoc())
{ 
    //$orderid=$r['orderid'];
    $uid=$r['uid1'];
    $iid=$r['iid'];
    $iname=$r['iname'];
    $qty=$r['qty'];
    $amt=$r['amt'];
    $odate=$r['odate'];
    $total=$r['total'];
    $st=$r['st'];
    $grandtotal=$grandtotal+$total;
    $qry="insert into order1(uid1,iid,iname,qty,amt,odate,total,st,grandtotal) values('".$uid."',".$iid.",'".$iname."',".$qty.",".$amt.",'".$odate."',".$total.",'".$st."',".$grandtotal.")";
    $rslt=$cn->query($qry);
    if($rslt){
        $rslt3=$cn->query("TRUNCATE TABLE `cart`;");
        echo"<script>alert('Order placed successfully!!!');</script>";
        echo '<script>window.location.href="../customer/cart.php";</script>';
       
    }
    else{
        echo"<script>alert('There was a problem in placing your order!!!');</script>";
        echo '<script>window.location.href="../customer/cart.php";</script>';
        
      
    }

}
}
else{
    echo"<script>alert('Cart is empty!!!');</script>";
    echo '<script>window.location.href="../customer/cart.php";</script>';
}
?>