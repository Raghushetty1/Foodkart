<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <style>
        * {
            padding: 0%;
            margin: 0;
            all: revert;
        }
    </style>

</head>

<body>
    <header>
        <nav  style="background-image: url('../Foodkart/images/home-banner-2.jpg');  background-position: center;
  background-repeat: no-repeat;
  background-size: cover">
            <div class="nav">
                <div class="icon">
                    <h1 class="text-left-right" style="padding-left:2px; width:83%; margin:27px 21px; font-family:arial; color:orangered; background-color:rgb(12, 12, 14)">
                        &nbsp;FoodKart
                    </h1>
                </div>
                <div style=" width:80%; padding-left: 1%;  height:fit-content; margin:1% 0%; align-items:right; float:right" class="navbar text-right">
                    <ul style=" color:black; justify-content:end; width:100%">
                        <li>
                        <button class="btn btn-secondary">
                            <a href="../Foodkart/customer/menu.php" style="text-decoration:none">Order Online</a>
                        </button>
                        </li>
                        <li>
                            <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                    Log in
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark w-100" style="align-content:left; width:fit-content" aria-labelledby="Login">
                                    <li style="float:left"><a class="dropdown-item" href="../Foodkart/login.php">Admin</a></li>
                                    <li style="float:left"><a class="dropdown-item" href="../Foodkart/loginc.php">Customer</a></li>
                                    <li style="float:left"><a class="dropdown-item" href="../Foodkart/logine.php">Employee</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="../Foodkart/contact.php" style="text-decoration:none;">Contact</a>
                        </li>
                        <li>
                            <a href="../Foodkart/aboutus.php" style="text-decoration:none">About</a>
                        </li>
                        <li>
                            <a href="../Foodkart/home.php" style="text-decoration:none">Home</a>
                        </li>
                    </ul>
                </div>
                <div class="content">
                    <br>
                    <br>
                    <br>
                    <p>&#160;
                    <h1 style="margin:30px">Good food<br><span>Good mood</span><br>Show your Love about Food</h1>
                    </p>
                </div>
            </div>
        </nav>
    </header>

    <!--carousel and cards div-->

    <div style="height: 100%; width:auto" id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="false" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div> -->

        <div class="carousel-inner" >

            <div class="carousel-item active" style="background:rgb(204, 204, 255);height:800px; margin:inherit" data-bs-interval="10000">
                <!-- <img src="images/1.jpg" height="100%" width="100%" class="d-block w-100" alt="..."> -->
                <div class="carousel-caption d-none d-md-block" style="height:90%;  margin:auto">
                    <h3 style="color:orangered; padding: 1%; font-weight:bolder">Special
                        dishes prepared to be served</h3>
                    <div class="card-group">
                        <?php include('../Foodkart/con_db.php');
                        $i = 1;
                        //$qry="select * from item where special='1'";
                        $rslt = $cn->query("select * from item where special=1");
                        while ($r = $rslt->fetch_assoc()) {
                            $i = $i + 1;


                        ?>
                            <div class="card" style="height:600px">
                                <?php echo '<img src="../Foodkart/images/' . $r['img'] . '" style="height:400px"class="card-img-top" width="50" height="50"/>'; ?>
                                <!-- <img src="images/poori.jpg" height="50" width="50" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $r['iname']; ?></h5>
                                    <p class="card-text"><?php echo $r['descrip']; ?>
                                    </p>
                                    <a href="../Foodkart/customer/menu.php" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                            <!-- <div class="card">
                               
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">crispy crep Masala Dosa made of fermented rice served with tasty Chutney, Sambar.</p>
                                    <a href="#" class="btn btn-primary">Order</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="images/idli.jpg" height="50" width="50" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Special Idli Vada</h5>
                                    <p class="card-text"> </p>
                                    <a href="#" class="btn btn-primary">Order</a>
                                </div>
                            </div> -->
                            <?php }?>
                    </div>
                </div>
            </div>
        
        
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>