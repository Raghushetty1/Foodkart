<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Login</title>
    <style>
        body {
            background-image: url('images/bg.jpg');
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="nav row" style="height:fit-content; width:100%">
        <div class="container">
            <div class="logo" style="text-align:left; height:100%; width: 30%; padding-left:0%; margin:1% -20%">
                <a href="#" title="Logo" style="padding:-10%; text-decoration: none; float:left;">
                    <h1 class="text-left-left"
                        style="padding-left:2px; text-align:left; width:80%; margin:14px 21px; font-family:arial; background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%);color:orangered">
                        FoodKart
                    </h1>
                </a>
            </div>
            <div class="navbar text-right">
                <ul>
                    <li>
                        <button class="btn1">
                            <a href="../Foodkart/customer/menu.php" style="text-decoration:none">Order Online</a>
                        </button>
                    </li>
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown"
                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Log in
                            </button>
                            <ul class="dropdown-menu dropdown-menu w-100" aria-labelledby="Login">
                                <li style="float:left"><a class="dropdown-item" href="login.php">Admin</a></li>
                                <li style="float:left"><a class="dropdown-item" href="loginc.php">Customer</a></li>
                                <li style="float:left"><a class="dropdown-item" href="logine.php">Employee</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="../Foodkart/contact.php" style="text-decoration:none">Contact</a>
                    </li>
                    <li>
                        <a href="../Foodkart/aboutus.php" style="text-decoration:none">About</a>
                    </li>
                    <li>
                        <a href="../Foodkart/home.php" style="text-decoration:none">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="login" style=" margin:-5% 15%; padding:0% 26%; padding-left: 57%">
        <form action=" " method="POST" style="  margin: 25% 23%">
            <h2 syle="font-size:20px">LOG IN</h2>
            <label for="user">User Name</label>
            <input type="text" id="log" value="" name="user" placeholder="User Name"><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="pwd" value="" placeholder="Password"><br>

            <button type="submit" name="submit">Login</button>

            <a href="signup.php" class="ca" style="color:white">Create an account</a><br>
            <a href="forgotpwd.php" class="ca" style="color:white">Forgot password?</a><br>
            <br>
            <!--<center>
                <p style="color:white">Are you a Admin?</p>
            </center>
            <a href="www.google.com"><button class="admin" type="button">Admin</button></a>
            <div class="icons">-->
                <!--<a href="#">
                    <ion-icon name="logo-facebook" size="small"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
               </a>-->
                <!--<a href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="logo-google"></ion-icon>
                </a>-->
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>


<!--php-->
<?php
if(isset($_POST['submit']))
{
    
	$user=$_POST['user'];
    $_SESSION['forget']=$user;
    print_r($_SESSION);
	$pwd=$_POST['pwd'];
    //echo"<form target='_self'>";
	//echo "<font size='6'>";
	@$cn=new mysqli('localhost','root','','foodkart');
	if($cn->connect_error)
	{
		echo"<script>alert('connect error');</script>"; 
		exit;
	}
	$qry="select * from customer where user='$user'";
	$rslt=$cn->query($qry);
	if($rslt->num_rows!=0)
	{
		$qry="select * from customer where user='$user' and pwd='$pwd'";
        $rslt=$cn->query($qry);
		if($rslt->num_rows!=0)
		{
            //echo $user;
            $_SESSION['customer']=$user;
           // echo print_r($_SESSION);
           

            // echo"<script>alert('Loging in!');</script>";
            echo '<script>window.location.href="customer/menu.php";</script>';

		}
		else
		{
                echo"<script>alert('Incorrect passward!!!');</script>";
		}
	}
	else
	{
        echo"<script>alert('username not exists!');</script>";
	}
	//echo "</font></form>";
	$cn->close();
}
?>