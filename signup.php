<!DOCTYPE html>
<html lang="en">
<head>
    <title>sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesign.css">
</head>
<body style="padding:50px">
<div class="login" >
        <form action="signup.php" method="post">
            <h2 syle="font-size:20px">SIGN UP</h2>
            <label for="nam">First Name:</label>
            <input type="text" id="nam" value="" name="nam" placeholder="First name"><br>

            <label for="lst">Last Name:</label>
            <input type="text" id="lst" name="lst" value="" placeholder="Last name"><br>

            <label for="eml">Email:</label>
            <input type="email" id="eml" name="eml" value="" placeholder="Email">

            <label for="add">Address:</label>
            <input type="text" id="address" name="address" value="" placeholder="Address"><br>

            <label for="pwd">Create a password</label>
            <input type="password" id="pwd" value="" name="pwd" placeholder="Create a password">

            <label for="cnfrm">Confirm a password?</label>
            <input type="password"  id="cnfrm" value="" name="cnfrm" placeholder="Confirm your password?">

            <button type="submit"  name="submit">Sign up</button>

            <a href="loginc.php" class="ca" style="color:white">Already have an account?</a><br>
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
if(isset($_POST['submit']))
{
    $frst=$_POST['nam'];
    $lst=$_POST['lst'];
    $eml1=$_POST['eml'];
    $address1=$_POST['address'];
    $user=$_POST['eml'];
    $pwd=$_POST['pwd'];
    $cnfrm=$_POST['cnfrm'];
    if($pwd==$cnfrm)
    {
        @$cn=new mysqli('localhost','root','','foodkart');
        if($cn->connect_error) 
        {
            echo"<script>alert('Couldn't connect!!!');</script>";
            exit;  
        }
        else
        {
            $qry="select * from customer where user='$user'";
            $rslt=$cn->query($qry);
            //$uid="select max(uid) from customer"+1;
            //echo $uid;
            if($rslt->num_rows!=0)
            {
                echo"<script>alert('Customer with the username already exists!!!');</script>";
            }
            else
            {
                $qry="insert into customer values('".$frst."','".$lst."','".$eml1."','".$address1."','".$user."','".$pwd."')";
                $rslt=$cn->query($qry);
                if($rslt)
                {
                    echo"<script>alert('YOU HAVE SUCCESSFULLY RIGISTERED!!!');</script>";
                    header('location:loginc.php');
                }
            }
        }
    }
    else
    {
       echo"<script>alert('Password donot match!!');</script>";
    }
    $cn->close();
}
?>