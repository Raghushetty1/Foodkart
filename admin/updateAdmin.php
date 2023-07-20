<?php
if (isset($_GET['update1'])) {
    $admin = $_GET['update1'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesign.css">
</head>

<body style="background-color: rgb(231, 228, 223)">
    <form style="float:left; margin:5%; padding:4%; border:2px solid black; border-radius: 15px" action=" " method="post" enctype="multipart/form-data">
        <h3>ADD CATEGORY DETAILS</h3>
        <?php include '../con_db.php';
        $rslt = $cn->query("SELECT * from admin where user='$admin'");
        if ($rslt->num_rows > 0) {
            $r = $rslt->fetch_assoc();

            $user2 = $r['user'];
            $pwd2 = $r['pwd'];
        }
        ?>
        <div class="mb-3">
            <label for="cid" class="form-label">Admin  id:</label>
            <input type="text" required name="aid" maxlength="10"  value="<?php echo $user2; ?>" placeholder="Enter the admin id" class="form-control" id="aid">
        </div>

        <div class="mb-3">
            <label for="cname" class="form-label">Category name:</label>
            <input type="text" required name="pwd" minlength="6" maxlength="16" value="<?php echo $pwd2; ?>" placeholder="Enter the password" class="form-control" id="pwd">
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
//include '../con_db.php';
if (isset($_POST['submit'])) 
{
            $user= $_POST['aid'];
            $pwd = $_POST['pwd'];

                    $qry = "UPDATE admin SET  user='" . $user . "',pwd='" . $pwd . "' WHERE user='" . $admin . "'";
                    $rslt = $cn->query($qry);
                    if ($rslt) 
                    {
                        echo "<script>alert('ADMIN DETAILS SUCCESSFULLY UPDATED!!!');</script>";
                        echo '<script>window.location.href="../admin/adminModify.php";</script>';
                    } 
                    else 
                    {
                        echo "<script>alert('ADMIN DETAILS NOT UPDATED!!!');</script>";
                        echo '<script>window.location.href="../admin/adminModify.php";</script>';
                    }
              
} 


//$img1=$_POST['image'];
//@$cn=new mysqli('localhost','root','','foodkart');
/*if($cn->connect_error) 
    {
        echo"<script>alert('Couldn't connect!!!');</script>";
        exit;  
    }
    else
    {*/

$cn->close();
?>