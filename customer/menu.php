<?php
session_start();

@$customer = $_SESSION['customer'];



//echo $customer;
// if(isset($_GET['customer']))
// {
//     @$user1=$_GET['customer'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FOOD MENU</title>
    <link rel="stylesheet" href="stylefrm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section class="nav row" style="height:fit-content; width:101%; height:90px; background:rgb(255, 255, 255)">
        <div class="container">
            <div class="logo" style="text-align:left; height:100%; width: 30%; padding-left:0%; margin:1% 1%">
                <a href="#" title="Logo" style="padding:-10%; text-decoration: none; float:left;">
                    <h1 class="text-left-left" style="padding-left:2px; text-align:left; width:80%; margin:14px 21px; font-family:arial; background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%);color:orangered">
                        FoodKart
                    </h1>
                </a>
            </div>
            <div style="padding:10px 120px" class="navbar text-right">
                <ul>
                    <li>
                        <button style="width:120px;border:1px solid black" class="btn">
                            <a href="../customer/cart.php" style="text-decoration:none">
                                <i class="fa fa-shopping-cart"></i>
                                Cart</a>
                        </button>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Log in
                            </button>
                            <ul class="dropdown-menu dropdown-menu w-100" aria-labelledby="Login">
                                <li style="float:left"><a class="dropdown-item" href="../login.php">Admin</a></li>
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


    <!--<div style="margin:0%; height:10%">
        <img class="card-img" src="1.jpg" alt="Card image">
            <h2><a href="#" class="text-white">Menu</a></h2>

        </div>-->
    <div style="background-color: rgb(159, 226, 191); padding:8px">
        <center>
            <h2 style="margin:0% 6%; font-weight:bold">Explore food</h2>
        </center>
    </div>

    <section style="background-color: rgb(159, 226, 191 ); padding:2%" class="categories">
        <div class="container1" style="  min-height: 400px;">

            <!-- <div class="card bg-dark text-white">
                <img class="card-img" src="1.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <h5 class="card-title">Explore Foods</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

                </div>
            </div>-->


            <?php
            include "../con_db.php";

            //Display all the cateories that are active
            //Sql Query
            $qry = "SELECT * FROM category WHERE active='1'";

            //Execute the Query
            $res = $cn->query($qry);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether categories available or not
            if ($count > 0) {
                //CAtegories Available
                while ($r = $res->fetch_assoc()) {
                    //Get the Values
                    $id = $r['cat_id'];
                    $title = $r['cname'];
                    $image_name = $r['img'];
            ?>

                    <a href="itemc.php?category_id=<?php echo $id; ?>">
                        <div style="width: 20%;  float: left; margin: 2%; position: relative; overflow:hidden; border-radius: 25px">
                            <?php
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not found.</div>";
                            } else {
                                //Image Available
                            ?>
                                <?php echo '<img src="../images/' . $r['img'] . '" width="100" height="110" alt="image1" class="card-img-top"/>'; ?>
                            <?php
                            }
                            ?>
                            <a href="itemc.php?category_id=<?php echo $id; ?>">
                                <h3 class="tst" style=" text-align:center; font-weight:bold;  position:absolute; bottom: 50px; left: 23.5%; color: white"><?php echo $r['cname']; ?></h3>
                            </a>
                        </div>
                    </a>

            <?php
                }
            } else {
                //CAtegories Not Available
                echo "<div class='error' style='float:center; font-size:large'>No category added to the menu.</div>";
            }

            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- social Section Starts Here -->
    <div style="font-weight:bold">
        <center>-Contact us on-</center>
    </div>

    <section class="social" style="height: 70px">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://restaurant-guru.in/bhandarkars-College-canteen-Kundapur"><img src="https://img.icons8.com/color/48/000000/google-logo.png" /></a>
                </li>
                <li>
                    <a href="https://instagram.com/raghu_shetty_01?igshid=YmMyMTA2M2Y="><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100007202568659"><img src="https://img.icons8.com/fluent/48/000000/facebook.png" /></a>
                </li>
            </ul>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>