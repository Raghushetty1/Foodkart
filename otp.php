<?php
session_start();
$success = "";
//echo $_SESSION['user'];
if (isset($_GET['success'])) {


    $success = $_GET['success'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GENERATE OTP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesign.css">
</head>

<body >
    <form name="frmUser"  style="margin:50px;height:450px"method="post" action="">
        <div class="tblLogin" style="height:300px">
            <?php

            if (!empty($success == 1)) {
            ?>
                <div class="tableheader" style="color:white">Enter OTP</div>
                <p style="color:#31ab00;">Check your email for the OTP</p>

                <div class="tablerow">
                    <input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
                </div>
                <div class="tableheader"><input type="submit" stylek="border:2px solid black" name="submit_otp" value="Submit" class="btnSubmit"></div>
                <?php echo '<a href="../Foodkart/otp.php?success=' . $success = 0 . '"><button type="button">Resend OTP</button></a>'; ?>
        </div>

    <?php
            } else if ($success == 2) {
    ?>
        <div >
            <p style="color:#31ab00">Otp successfully matched!!!</p>
            <form action=" " method="post" style=" background:linear-gradient(to top, rgba(0,0,0,0.8) 50%,rgba(0,0,0,0.8)  50%)">
                <h2 syle="font-size:20px">Forgot password</h2>
                <?php $username= $_SESSION['pwdUser']; ?>

                <label for="opwd">Enter the user name:</label>
                <input type="text" id="user1" required readonly value="<?php echo $username; ?>" name="user1" placeholder="Enter the username">
                <label for="update">Enter the new password:</label>
                <input type="text" id="update" required value="" name="update" placeholder="Enter the password">

                <br>
                <a href="forgotalert.php"><label>Didn't recieved OTP?Other ways</label></a><br>


                <button type="submit" name="submit">Submit</button>

                <a href="loginc.php" class="ca" style="color:white">Enter password?</a><br>
                <br>
        </div>
    <?php
            } else {
    ?>

        <div class="tableheader" style="color:white!important">Enter Your Login Email</div>
        <div class="tablerow"><input type="email" required name="email" placeholder="Email" class="login-input" required></div>
        <div class="tableheader"><input type="submit" style="background-color:#ff7200" name="submit_email" value="SEND OTP" class="btnSubmit"></div>
    <?php
            }
    ?>
    </div>
    </form>
</body>
<?php
$success = "";
$error_message = "";

if (!empty($_POST["submit_email"])) {
    //echo($_POST["email"]);
    $_SESSION['pwdUser']=$_POST['email'];
    $cn = new mysqli('localhost', 'root', '', 'foodkart');
    $qry = "SELECT * FROM customer WHERE email='" . $_POST["email"] . "'";
    $rslt = $cn->query("SELECT * FROM customer WHERE email='" . $_POST["email"] . "'");
    //$frm="shettymraghavendra39@gmail.com";
    $headers = "From: canteenb133@gmail.com";
    // print_r($rslt);
    //echo($count);
    // echo($qry);

    $eml = $_POST["email"];
    $sub = "One time password";
    // echo($eml);
    // print($rslt->num_rows);
    if ($rslt->num_rows > 0) {
        // generate OTP
        $otp = rand(100000, 999999);
        // echo($otp);
        // Send OTP
        require_once("otp.php");

        $bdy="Use this one time password to reset password.Your otp is:".$otp."\n\n\nThank you\nTeam Foodkart";
        //echo($bdy);
        //echo($mail_status);
        if (mail($eml, $sub, $bdy, $headers)) {
            // echo("e sent");
            $result = mysqli_query($cn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");

            // $current_id = mysqli_insert_id($cn);
            // echo($current_id);

            if ($result) {
                $success = 1;
                echo "hii";
                echo '<script>window.location.href="../Foodkart/otp.php?success=' . $success . '";</script>';
            }
            // echo ($success);
        } else {
            //echo(error_get_last()['message']);
            print_r(error_get_last());
            echo ("There is a problem in sending the mail!!");
        }
    } else {
        echo "<script>alert('Email not exists!!!');</script>";
    }
}
if (!empty($_POST["submit_otp"])) {
    $cn = new mysqli('localhost', 'root', '', 'foodkart');
    $result = $cn->query("SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
    $count  = mysqli_num_rows($result);
    if (!empty($count)) {
        $result = mysqli_query($cn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
        $success = 2;
        echo '<script>window.location.href="../Foodkart/otp.php?success=' . $success . '";</script>';
    } else {
        $success = 1;
        echo "<script>alert('INVALID OTP!!!');</script>";
        echo '<script>window.location.href="../Foodkart/otp.php?success=' . $success . '";</script>';
    }
}
?>
<?php
if (isset($_POST['submit'])) {

    $update = $_POST['update'];
    // echo($update);
    $forget_user = $_POST['user1'];
    // echo $opwd;
    // echo $forget_user;
    @$cn = new mysqli('localhost', 'root', '', 'foodkart');
    if ($cn->connect_error) {
        echo "<script>alert('Couldn't connect!!!');</script>";
        exit;
    }

    $rslt = $cn->query("select * from customer where user='$forget_user'");
    // print_r($rslt);
    if ($r = $rslt->fetch_assoc()) {
        // echo("hii");
        // print_r($r);
        // $str=$r['pwd'];
        // echo($str);
        // $pwd1=substr($str,-4);
        // if($opwd==$pwd1)
        // {    
        //@$cn=new mysqli('localhost','root','','foodkart');
        // if($cn->connect_error) 
        // {
        //     echo"<script>alert('Couldn't connect!!!');</script>";
        //     exit;  
        // }
        // else
        // {
        // $qry="select * from customer where user='$user'";
        // $rslt=$cn->query($qry);
        // //$uid="select max(uid) from customer"+1;
        // //echo $uid;
        // if($rslt->num_rows!=0)
        // {
        $qry = "update customer set pwd='$update' where user='" . $forget_user . "'";
        $rslt = $cn->query($qry);
        if ($rslt) {
            echo "<script>alert('PASSWORD SUCCESSFULLY CHANGED!!!');</script>";
            echo '<script>window.location.href="../Foodkart/loginc.php";</script>';
        }
        // }
        // else
        // {
        //     echo"<script>alert('Customer with the username doesn't exists!!!');</script>";

        // }
        // }
        // }
        // else
        // {
        //     echo"<script>alert('Wrong input Try again!!');</script>";
        //     echo '<script>window.location.href="../Foodkart/loginc.php";</script>';
        // }
        $cn->close();
    } else {
        echo "<script>alert('Wrong username,Try again!!!');</script>";
    }
}

?>