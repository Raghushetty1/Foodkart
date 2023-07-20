<?php
if (isset($_GET['updateid'])) {
    $user = $_GET['updateid'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update employee</title>
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
        <h3>ADD EMPLOYEE DETAILS</h3>
        <?php include '../con_db.php';
        $rslt = $cn->query("SELECT * from emp where user='$user'");
        if ($rslt->num_rows > 0) {
            $r = $rslt->fetch_assoc();

            $pwd2 = $r['pwd'];
            $name2 = $r['name'];
            $desg2 = $r['desg'];
            $age2 = $r['age'];
            $address2 = $r['address'];
            $sal2 = $r['salary'];
            //echo "$age2,$sal2";
        } ?>
        <div class="mb-3">
            <label for="user" class="form-label">User id:</label>
            <input type="text" id="user" readonly value="<?php echo $user; ?> " name="user"><br>
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" id="pwd" class="form-control" value="<?php echo $pwd2; ?> " minlength="8" maxlength="20" name="pwd" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>

        <div class="mb-3">
            <label for="nam" class="form-label">Employee name:</label>
            <input type="text" name="nam" maxlength="20" value="<?php echo $name2; ?> " placeholder="Enter the item name" class="form-control" id="nam">
        </div>

        <div class="mb-3">
            <label for="desg" class="form-label">Designation:</label>
            <input type="text" name="desg" maxlength="20" value="<?php echo $desg2; ?> " placeholder="Enter the designation" class="form-control" id="desg">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" style="text-decoration:none" min="15" value="<?php echo $age2; ?>" max="90" name="age" maxlength="3" placeholder="Enter the age" class="form-control" id="age">
        </div>

        <div class="mb-3">
            <label for="add" class="form-label">Address:</label>
            <input type="textarea" name="add" maxlength="50" value="<?php echo $address2; ?> " placeholder="Enter the address" class="form-control" id="add">
        </div>

        <div class="mb-3">
            <label for="sal" class="form-label">Salary:</label>
            <input type="number" style="text-decoration:none" max="100000" name="sal" placeholder="Enter the employee salary" value="<?php echo $sal2; ?>" class="form-control" id="sal">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $nam = $_POST['nam'];
    $desg = $_POST['desg'];
    $age = $_POST['age'];
    $add = $_POST['add'];
    $sal = $_POST['sal'];
    @$cn = new mysqli('localhost', 'root', '', 'foodkart');
    if ($cn->connect_error) {
        echo "<script>alert('Couldn't connect!!!');</script>";
        exit;
    } else {
        $qry = "SELECT * from emp where user='$user'";
        $rslt = $cn->query($qry);
        if ($rslt->num_rows != 0) {
            $uqry = "UPDATE emp SET user='" . $user . "',pwd='" . $pwd . "',name='" . $nam . "',desg='" . $desg . "',age='" . $age . "',address='" . $add . "',salary='" . $sal . "' WHERE user='" . $user . "'";
            $rslt = $cn->query($uqry);
            if ($rslt) {
                echo "<script>alert('EMPLOYEE DETAILS SUCCESSFULLY UPDATED!!!');</script>";
                header("location:staff.php");
            }
        } else {
            echo "<script>alert('Employee with the username Doesn't exists!!!');</script>";
        }
    }
    $cn->close();
}
?>
}