<?php
session_start();
if (isset($_SESSION['customer'])) 
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CART</title>
    <link rel="stylesheet" href="styleitemc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <section class="nav row" style="height:fit-content; width:101%; height:90px; background:rgb(102, 205, 170)">
        <div class="container">
            <div class="logo" style="text-align:left; height:100%; width: 30%; padding-left:-1%; margin:0% 1%">
                <a href="#" title="Logo" style="padding:-10%; text-decoration: none; float:left;">
                    <h1 class="text-left-left" style="padding-left:2px; text-align:left; width:80%; margin:14px 21px; font-family:arial; background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%);color:orangered">
                        FoodKart
                    </h1>
                </a>
            </div>
            <div style=" padding:1px 120px" class="navbar text-right">
                <ul>
                    <li>
                        <button class="btn1" style="width:120px">
                            <a href="../customer/menu.php" style="text-decoration:none">Menu</a>
                        </button>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Log in
                            </button>
                            <ul class="dropdown-menu dropdown-menu w-100" aria-labelledby="Login">
                                <li style="float:left"><a class="dropdown-item" href="../login.html">Admin</a></li>
                                <li style="float:left"><a class="dropdown-item" href="../loginc.php">Customer</a></li>
                                <li style="float:left"><a class="dropdown-item" href="../logine.php">Employee</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="../contact.php" style="text-decoration:none">Contact</a>
                    </li>
                    <li>
                        <a href="../aboutus.php" style="text-decoration:none">About</a>
                    </li>
                    <li>
                        <a href="../home.php" style="text-decoration:none">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div style="padding:2%;background:rgb(102, 205, 170);height:90px;overflow:hidden">
    <a href="../customer/pendingorder.php"><button style="float:left; background:rgb(204, 243,255);border-radius:10px">Pending orders</button></a>
    <a href="../customer/prepared.php"><button style="float:left; margin:0% 2%;background:rgb(204, 243,255);border-radius:10px">Prepared orders</button></a>
    </div>
    <div class="cartcontainer" style="overflow:hidden;padding:1%;margin:0% 0%;height:700px;background:rgb(102, 205, 170)">
        <div class="containeritem" style="border:2px solid white;border-radius:20px">
            <?php
            include('../con_db.php');
            $qry = "select * from cart where st='Not prepared'";
            $rslt = $cn->query($qry);
            echo "<table align='center' style='background:rgb(102, 205, 170);align-items:center;justify-content:center;text-align:center; content-align:center; margin: 0px auto;'>";
            echo "<tr style='width:200px;  border-bottom-white;height:100px;'>
            <th style='color:white;width:200px; height:150px'> Image</th>
            <th style='color:white;width:200px; height:150px'>Item name</th>
            <th style='color:white;width:200px; height:150px'>Price</th>
           
           
            <th style='color:white;width:200px; height:150px'>Quantity</th>
            <th></th>
            <th></th>
            <th style='color:white;width:200px; height:150px'>Payment</th>
            </tr>";
            $payment=0; 
            $gtotal=0;
            while ($r = $rslt->fetch_assoc())
             {
                $iid1 = $r['iid'];
                //echo $iid1;
                $qry1 = "select * from item where iid=" . $iid1;
                $rslt1 = $cn->query($qry1);
               
                while ($r1 = $rslt1->fetch_assoc()) {
                ?>

                    <tr>
                        <td style=" width:200px; height:150px">
                        <?php echo '<img src="../images/' . $r1['img'] . '" style="width:100px; height:110px" />'; ?>
                    </td>
                    <?php } ?>
                    <td style="width:200px; height:150px">
                        <font style="font-weight:bolder"><?php echo $r['iname']; ?></font>
                    </td>
                    <td style="width:200px; height:150px">
                        <font style="font-weight:bolder"><?php echo $r['amt']; ?></font>
                    </td>
                    <!-- <td style="width:200px; height:150px">
                        <font style="font-weight:bolder"><?php echo $r['qty']; ?></font>
                    </td> -->
                    <td style="width:60px; height:150px">
                        <font style="text-align:center;font-weight:bolder">X</font>
                    </td>
                    <form action="cart.php" method="POST" id="myform">
                    <td><input type="hidden" value="<?php echo $r['iid'];?>" name="iidhidden" id="iidhidden"/></td>

                    <td style="width:200px; height:150px"><input style="width:70px; height:50px; content-align:center"name="qty" onchange="this.form.submit()"  id="qty1" type="number" min="0" value="<?php echo $r['qty']; ?>" /></td>
                    </form>
                    <td style="width:200px; height:150px">
                        <font style="font-weight:bolder"><?php  $payment=$r['amt']*$r['qty']; echo $payment; ?></font>
                    </td>
                    <td style="width:200px; height:150px; justify-content:center"><a href="removecart.php?iid=<?php echo $iid1;?>"><button style="margin:7%" type="button" class="btn btn-primary">remove</button></a></td>
                    <?php $gtotal=$gtotal+$r['amt']*$r['qty'];
                    //echo $gtotal; 
                 } ?>
                </table> 
               
        </div>
        <br>
        <!-- <label for="txt1">Total Bill Amount:</label> <input type="text" readonly style="width: 150px; align-content:center" name=""  value="<?php echo @$gtotal;?>"id="txt1"> -->
        <div class="card">
          <div class="card-body">
          <label style="float:left; font-weight:bold;color:black;margin:0.5%" for="txt1">Total Bill Amount:</label> <input type="text"  readonly style="width: 150px;float:left; align-content:center" name=""  value="<?php echo @$gtotal;?>" id="txt1">
          <a href="placeorder.php"><button type="button" class="btn btn-warning btn-block btn-lg">Place order</button></a>
          </div>
        </div>
    </div>
    </div>
    <!-- <script type="text/javascript">
        function call(){
            //GETTING THE FORM DATA
          
          var params=new URLSearchParams();
          var iid1=document.getElementById("iidhidden").value;
        window.alert(iid1);
          params.set("qty",document.getElementById("qty1").value);
           //redirection
           window.location.href="../customer/qtychange.php?"+params.toString()+"&iid="+iid;
           return false;
           //window.location.href="qtychange.php";
           //window.alert("hii");
        }
        </script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>
<?php
//echo"HII";
if(isset($_POST['qty'])){
    //echo"HII";
$iid2=$_POST['iidhidden'];
$qty=$_POST['qty'];
include "../con_db.php";

$qry="select * from cart where iid=".$iid2;
$rslt=$cn->query($qry);
if($rslt->num_rows!=0){
    $qry1="update cart set qty='.$qty.' where iid=".$iid2;
    $rslt1=$cn->query($qry1);
    if($rslt)
    {
        echo"<script>alert('Quantity updated!!!');</script>";
        echo '<script>window.location.href="../customer/cart.php";</script>';
    }
    else
    {
        echo"<script>alert('Quantity not updated!!!');</script>";
    }
}
else
{
    echo"<script>alert('Item not found in the cart!!!');</script>";
}
}
}
else
{
    echo "<script>alert('Login first!!!');</script>";
    echo '<script>window.location.href="../loginc.php";</script>';  
}
?>