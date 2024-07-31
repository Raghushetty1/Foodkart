<?php
session_start();
//echo print_r($_SESSION);
if (isset($_SESSION['customer'])) 
{
    //echo $_SESSION['customer'];  
    @$cat = $_SESSION['category_id'];
    @$iid = $_SESSION['item_id'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORDER</title>
        <link rel="stylesheet" href="styleorder.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

        <section class="nav row" style="overflow:visible; border-bottom: solid white;  width:101%; height:90px; background:rgb(204, 204, 255)">
            <div class="container">
                <div class="logo" style="text-align:left; height:100%; width: 30%; padding-left:-1%; margin:0% 1%">
                    <a href="#" title="Logo" style="padding:-10%; text-decoration: none; float:left;">
                        <h1 class="text-left-left" style="padding-left:2px; text-align:left; width:80%; margin:14px 21px; font-family:arial; background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%);color:orangered">
                            FoodKart
                        </h1>
                    </a>
                </div>
                <div style="overflow:visible; padding:1px 120px" class="navbar">
                    <ul>
                        <li>
                            <button class="btn1">
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
        include "../con_db.php";
        //CHeck whether food id is set or not
        if (isset($_GET['iid']))
        {
            //Get the Food id and details of the selected food
            $iid = $_GET['iid'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM item WHERE iid=$iid";
            //Execute the Query
            $res = mysqli_query($cn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if ($count == 1) 
            {
                //WE Have DAta
                //GEt the Data from Database
                $r = mysqli_fetch_assoc($res);

                $iid1 = $r['iid'];
                $title = $r['iname'];
                $image_name = $r['img'];
                $price = $r['price'];
            }
             else 
            {
                //Food not Availabe
                //REdirect to the item Page
                header('<location:customer/itemc.php');
            }
        } 
        else
        {
            //Redirect to menu
            
            header('location:menu.php');
        }
        ?>

        <!-- fOOD sEARCH Section Starts Here -->
        <section class="food-search2">
            <div style="border:2px solid white; border-radius:25px" class="container">

                <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

                <form action="" method="POST" class="order">
                    <fieldset>
                        <legend>Selected Food</legend>

                        <div class="food-menu-img">
                            <?php

                            //CHeck whether the image is available or not
                            if ($image_name == "") 
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            } 
                            else 
                            {
                                //Image is Available
                            ?>
                                <?php echo '<img src="../images/' . $r['img'] . '" width="100" height="110"/>'; ?>
                            <?php
                            }

                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h3><?php echo $title; ?></h3>
                            <input type="text" readonly name="foodname" value="<?php echo $title; ?>">

                            <p class="food-price">₹<?php echo $price; ?></p>
                            <input type="text" readonly name="price" value="<?php echo $price; ?>">

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                            <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                        </div>

                    </fieldset>



                </form>

                <?php

                //CHeck whether submit button is clicked or not
                if (isset($_POST['submit'])) 
                {
                    // Get all the details from the form
                    $customer1 = $_GET['customer'];

                    $food = $_POST['foodname'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 
                    // echo $total;
                    // echo $qty;
                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Not prepared";  // Ordered, On Delivery, Delivered, Cancelled

                    // $customer_name = $_POST['full-name'];
                    // $customer_contact = $_POST['contact'];
                    // $customer_email = $_POST['email'];
                    // $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    //echo $_SESSION['customer'];
                    

                        $qry = "select * from cart where iid=" . $iid1;
                        $res = $cn->query($qry);
                        $rslt = $res->fetch_assoc();
                        if ($rslt == 0) 
                        {
                            $sql2 = "INSERT INTO cart SET 
                            iid = $iid1,
                            uid1='$customer1',  
                            iname='$food',
                            qty = $qty,
                            amt = $price,
                            odate='$order_date',
                            total=$total,
                            st='$status'      
                            ";

                            //echo $sql2; die();

                            //Execute the Query
                            $res2 = mysqli_query($cn, $sql2);

                            //Check whether query executed successfully or not
                            if ($res2 == true) 
                            {
                                //Query Executed and Order Saved
                                echo "<div class='success text-center'style='font-size:25px;font-weight:bolder'>Food added to cart Successfully.</div>";
                                $_SESSION['order'] = "<div class='success text-center'>Food added to cart Successfully.</div>";
                                //header('location:customer/cart.php');
                                echo '<script>window.location.href="../customer/cart.php";</script>';
                            }
                             else 
                             {
                                //Failed to Save Order
                                echo "<div class='error text-center' style='font-size:25px;font-weight:bolder'>Failed to add Food to the cart</div>";
                                $_SESSION['order'] = "<div class='error text-center'>Failed to add Food to the cart.</div>";
                                //header('location:customer/itemc.php');
                                echo '<script>window.location.href="customer/itemc.php";</script>';
                            }
                        }
                        else
                        {
                            echo "<script>alert('Item already in the cart!!!');</script>";
                            echo '<script>window.location.href="../customer/cart.php";</script>';

                        }
                       
                }
                
            

                ?>

            </div>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>

    </html>
   <?php
}
else
{
           echo "<script>alert('Login first!!!');</script>";
           echo '<script>window.location.href="../loginc.php";</script>';
}
       
?>