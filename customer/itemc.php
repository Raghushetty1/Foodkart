<?php
session_start();
//echo print_r($_SESSION);
@$customer1 = $_SESSION['customer'];
//echo $customer;
if (isset($_GET['category_id'])) {
    $cat = $_GET['category_id'];
    //$customer1 = $_GET['customer'];


    //echo $customer;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FOOD ITEMS</title>
        <link rel="stylesheet" href="styleitemc.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

        <section class="nav row" style="height:fit-content; width:101%; height:90px; background:rgb(204, 204, 255)">
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
                            <button style="width:120px" class="btn1">
                                <a href="../customer/cart.php" style="text-decoration:none"><i class="fa fa-shopping-cart"></i>
                                    Cart</a>
                            </button>
                        </li>
                        <li>
                            <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                    Log in
                                </button>
                                <ul class="dropdown-menu dropdown-menu w-100" aria-labelledby="Login">
                                    <li style="float:left"><a class="dropdown-item" href="login.html">Admin</a></li>
                                    <li style="float:left"><a class="dropdown-item" href="loginc.php">Customer</a></li>
                                    <li style="float:left"><a class="dropdown-item" href="logine.php">Employee</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" style="text-decoration:none">Contact</a>
                        </li>
                        <li>
                            <a href="#" style="text-decoration:none">About</a>
                        </li>
                        <li>
                            <a href="home.html" style="text-decoration:none">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
        @$customer = $_SESSION['customer'];
        //echo $customer;
        include "../con_db.php";
        $qry = "SELECT * from category where cat_id=" . $cat;
        $res = $cn->query($qry);
        while ($r = $res->fetch_assoc()) { ?>
            <section style=" width:100%; background-image: url('../images/fosyyyy.jpg');  background-size: cover; background-position: center;padding: 7% 0; margin:0%" class="sec1">
                <div class="container">
                    <h2><a href="#" class="text-white">Foods on "<?php echo $r['cname']; ?>"</a></h2>
                </div>
            </section>
        <?php } ?>
        <section class="categories" style="padding:0; background:rgb(204, 204, 255)">
            <div class="container" style=" width: 100%">
                <!--<h2 class="text-center">Explore Foods</h2>-->
                <div class="card-group" style="margin:2%; width: 100%;  ">

                    <?php


                    //Display all the cateories that are active
                    //Sql Query

                    $qry = "SELECT * FROM item where cid=" . $cat;


                    //Execute the Query
                    $res = $cn->query($qry);

                    //Count Rows
                    $count = mysqli_num_rows($res);
                    //CHeck whether categories available or not
                    if ($count > 0) {
                        //CAtegories Available
                        while ($r = $res->fetch_assoc()) {
                            //Get the Values
                            $id = $r['iid'];
                            $des = $r['descrip'];
                            $title = $r['iname'];
                            $image_name = $r['img'];
                    ?>
                            <div class="food-menu-box">
                                <div style=" position: relative; border-radius: 20px; overflow:hidden" class="food-menu-img">
                                    <?php
                                    if ($image_name == "") {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    } else {
                                        //Image Available
                                    ?>
                                        <?php echo '<img src="../images/' . $r['img'] . '"  alt="image" class="card-img-top" />'; ?>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h3><?php echo $title; ?></h3>
                                    <p class="food-price">₹<?php echo $r['price']; ?></p>
                                    <p class="food-detail"><?php echo $des; ?></p>
                                    <?php
                                    $_SESSION['item_id'] = $id;
                                    $x = 0;
                                    //$_SESSION['category_id']=$cat;
                                    //$_SESSION['customer']=$customer;
                                    // if (isset($_SESSION['customer'])) {
                                    //     $value = 1;
                                    // }
                                    //echo"hii";
                                    //echo $value;                    
                                    ?>
                                    <a href=" order.php?iid=<?php echo $id ?>&customer=<?php echo $customer ?>" style="background-color: #5d9e5f; color:white" class="btn">Order Now</a>
                                </div>
                            </div>

                        <?php
                            // if (isset($_COOKIE['x'])) {
                            //     $value1=$_COOKIE['x'];
                            // }
                            //echo $x;
                            $value1 = $x;
                            //echo $value1;
                            // if ($value1 == 1) {

                            // } else {
                            // echo "<script>windows.href('../loginc.php');</script>";
                            // }
                        }
                        echo "</div>";
                        ?>
                    <?php
                    } else {
                        //CAtegories Not Available
                        echo "<div class='error'>Category not found.</div>";
                    }

                    ?>
                    <div class="clearfix"></div>
        </section>

        <!-- social Section Starts Here -->
        <div style="background:rgb(204, 204, 255);font-weight:bold">
            <center>-Contact us on-</center>
        </div>
        <section class="social" style="background:rgb(204, 204, 255);height: 100px">
            <div class="container text-center">
                <ul>
                    <li>
                        <a href="https://restaurant-guru.in/bhandarkars-College-canteen-Kundapur"><img src="https://img.icons8.com/color/48/000000/google-logo.png" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100007202568659"><img src="https://img.icons8.com/fluent/48/000000/facebook.png" /></a>
                    </li>
                </ul>
            </div>
        </section>
        <!-- <script type="text/javascript">
            function myfun(){
            var x = <?php echo $value; ?>;
            document.write(x);
            }
        </script> -->
    <?php } else {
    echo "<script>windows.href('customer\menu.php');</script>";
}
    ?>
    <!-- <script src="my.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>

    </html>