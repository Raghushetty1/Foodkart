<?php
session_start();
if (isset($_SESSION['customer'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>PREPARED ORDER</title>
        <link rel="stylesheet" href="styleitemc.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body style="overflow:hidden;background-color:  #eee;">

        <section class="nav row" style="height:fit-content; width:101%; height:90px; background:rgb(102, 205, 170)">
            <div class="container">
                <div class="logo" style="text-align:left; height:100%; width: 30%; padding-left:-1%; margin:0% 1%">
                    <a href="../home.php" title="Logo" style="padding:-10%; text-decoration: none; float:left;">
                        <h1 class="text-left-left" style="padding-left:2px; text-align:left; width:80%; margin:14px 21px; font-family:arial; background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%);color:orangered">
                            FoodKart
                        </h1>
                    </a>
                </div>
                <div style=" padding:1px 120px" class="navbar text-right">
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
        <section class="h-100" style="overflow:hidden; background-color:  #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Prepared orders</h3>
                            <div>
                                <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                            </div>
                        </div>
                        <?php
                        include "../con_db.php";
                        $user1=$_SESSION['customer'];
                        $qry = "select * from order1 where st='Prepared' and uid1='".$user1."'";
                        $rslt = $cn->query($qry);
                        while ($r = $rslt->fetch_assoc()) {
                            $iid = $r['iid'];
                        ?>

                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <?php $qry1 = "select * from item where iid=" . $iid;
                                            $rslt1 = $cn->query($qry1);
                                            while ($r1 = $rslt1->fetch_assoc()) { ?>
                                            <?php
                                                echo '<img
                src="../images/' . $r1['img'] . '" class="img-fluid rounded-3" alt="image1">';
                                            } ?>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2"><?php $r['iname']; ?></p>
                                            <p><span class="text-muted">Status:</span><?php echo $r['st']; ?><br>
                                                <span class="text-muted">
                                                    Order date: </span><?php echo $r['odate']; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


                                            <input id="form1" min="0" readonly name="quantity" value="<?php echo $r['qty']; ?>" type="number" class="form-control form-control-sm" />


                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0"><?php echo $r['total']; ?></h5>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        <?php } ?>


                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </body>

    </html>
<?php } else {
    echo "<script>alert('Login first!!!');</script>";
    echo '<script>window.location.href="../loginc.php";</script>';
}
?>