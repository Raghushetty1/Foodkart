<?php
if (isset($_GET['update1'])) {
    $user1 = $_GET['update1'];
    //echo $user1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update user</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesign.css">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body style="background-color: rgb(231, 228, 223)">
    <form style="float:left; margin:5%; padding:3%; width:40%; border:2px solid black; border-radius: 15px" action=" " method="post" enctype="multipart/form-data">
        <h3>UPDATE USER DETAILS</h3>
        <?php include '../con_db.php';
        $rslt = $cn->query("SELECT * from customer where user='" . $user1 . "'");
        if ($rslt->num_rows > 0) {
            $r = $rslt->fetch_assoc();

            $frst2 = $r['frstname'];
            $lst2 = $r['lstname'];
            $email2 = $r['email'];
            $address2 = $r['address'];
            $pwd2 = $r['pwd'];
            //echo "$age2,$sal2";
        } ?>
        <div class="mb-3">
            <label for="user" class="form-label">User id:</label>
            <input type="text" id="user" readonly value="<?php echo $user1; ?> " name="user"><br>
        </div>

        <div class="mb-3">
            <label for="nam" class="form-label">First name</label>
            <input type="nam" id="nam" required class="form-control" value="<?php echo $frst2; ?> " placeholder="Enter first name" name="nam">
        </div>

        <div class="mb-3">
            <label for="lst" class="form-label">Last name:</label>
            <input type="text" required name="lst" placeholder="Enter last name" value="<?php echo $lst2; ?> " class="form-control" id="lst">
        </div>

        <div class="mb-3">
            <label for="eml" class="form-label">Email:</label>
            <input type="text" required name="eml" placeholder="Enter the email id" value="<?php echo $email2; ?> "  class="form-control" id="eml">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" required style="text-decoration:none" maxlength="40" name="address" value="<?php echo $address2; ?> " maxlength="3" placeholder="Enter the adress" class="form-control" id="address">
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Create password:</label>
            <input type="password" required name="pwd" minlength="8" maxlength="16" placeholder="Enter the password" class="form-control" aria-describedby="passwordHelpBlock" id="pwd">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>

        <div class="mb-3">
            <label for="cnfrm" class="form-label">Confirm Password:</label>
            <input type="password" required minlength="8" maxlength="16"style="text-decoration:none" name="cnfrm" placeholder="Reenter password" class="form-control" id="cnfrm">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $frst = $_POST['nam'];
    $lst = $_POST['lst'];
    $eml1 = $_POST['eml'];
    $address1 = $_POST['address'];
    $user = $_POST['eml'];
    $pwd = $_POST['pwd'];
    $cnfrm = $_POST['cnfrm'];
    if ($pwd == $cnfrm) {
        @$cn = new mysqli('localhost', 'root', '', 'foodkart');
        if ($cn->connect_error) {
            echo "<script>alert('Couldn't connect!!!');</script>";
            exit;
        } else {
            //echo"hii";
            $qry = "SELECT * from customer where user='" . $user1 . "'";
            //echo $qry;
            $rslt1 = $cn->query($qry);
            // print_r($rslt1);
            if ($rslt1->num_rows != 0) {
                //echo "hello";
                $uqry = "UPDATE customer SET frstname='" . $frst . "',lstname='" . $lst . "',email='" . $eml1 . "',address='" . $address1 . "',user='" . $user . "',pwd='" . $pwd . "' WHERE user='" . $user1 . "'";
    
                //echo $uqry;
                $rslt = $cn->query($uqry);
                if ($rslt) {
                    echo "<script>alert('Customer DETAILS SUCCESSFULLY UPDATED!!!');</script>";
                    echo '<script>window.location.href="../admin/user.php";</script>';
                }
            } else {
                echo "<script>alert('Customer with the username Doesn't exists!!!');</script>";
            }
        }
        $cn->close();
    }
}
?>