
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORGOT PASSWORD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesign.css">
</head>
<body>
<div class="login">
        <form action=" " method="post">
            <h2 syle="font-size:20px">Forgot password</h2>
           

            <label for="opwd">Enter the user name:</label>
            <input type="text"  id="user1" value="" required name="user1" placeholder="Enter the username">
            <label for="update">Enter the new password:</label>
            <input type="text"  id="update" required value="" name="update" placeholder="Enter the password">
            <label for="opwd">Enter last four digit of your old password</label>
            <input type="password"  required minlength="4" maxlength="4" id="opwd" value="" name="opwd" placeholder="Last four digit">
            <br>
            <a href="otp.php"><label>Dont rememeber last 4 digit?<span style="color:#ff7200;font-weight:bold">GENERATE OTP</span></label></a><br>


            <button type="submit"  name="submit">Submit</button>

            <a href="loginc.php" class="ca" style="color:white">Enter password?</a><br>
            <br>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])&&isset($_POST['update']))
{
    $opwd=$_POST['opwd'];
    $update=$_POST['update'];
    // echo($update);
    $forget_user=$_POST['user1'];
    // echo $opwd;
    // echo $forget_user;
    @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
   
    $rslt=$cn->query("select * from customer where user='$forget_user'");
    print_r($rslt);
    if($r=$rslt->fetch_assoc())
    {
        // echo("hii");
        // print_r($r);
        $str=$r['pwd'];
        // echo($str);
        $pwd1=substr($str,-4);
        if($opwd==$pwd1)
        {    
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
                $qry="update customer set pwd='$update' where user='".$forget_user."'";
                $rslt=$cn->query($qry);
                if($rslt)
                {
                    echo"<script>alert('PASSWORD SUCCESSFULLY CHANGED!!!');</script>";
                    echo '<script>window.location.href="../Foodkart/loginc.php";</script>';
                }
            // }
            // else
            // {
            //     echo"<script>alert('Customer with the username doesn't exists!!!');</script>";

            // }
        // }
        }
        else
        {
            echo"<script>alert('Wrong input Try again!!');</script>";
            echo '<script>window.location.href="../Foodkart/loginc.php";</script>';
        }
        $cn->close();
    }
    else
    {
        echo"<script>alert('Wrong username,Try again!!!');</script>";
    }
}

?>