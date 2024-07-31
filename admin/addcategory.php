<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylecat.css">
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
    <form style="float:left; margin:5%; padding:4%; border:2px solid black; border-radius: 15px" action=" " method="post" enctype="multipart/form-data">
        <h3>ADD CATEGORY DETAILS</h3>

        <div class="mb-3">
            <label for="cid" class="form-label">Category id:</label>
            <input type="number" required name="cid" maxlength="10" placeholder="Enter the item id" class="form-control" id="cid">
        </div>

        <div class="mb-3">
            <label for="cname" class="form-label">Category name:</label>
            <input type="text" required name="cname" maxlength="10" placeholder="Enter the item id" class="form-control" id="cname">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload image</label>
            <input type="file" required name="image" class="form-control" id="image">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
       crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php
include("../con_db.php");
if (isset($_POST['submit'])) {
    $cat_id1 = $_POST['cid'];
    $cname1 = $_POST['cname'];
   
    if (!empty($_FILES['image']['name'])) {
        //get file info
        $filename = basename($_FILES['image']['name']);
        $target="../images/".$filename;
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        //Allow certain file formats
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($filetype, $allowtypes)) {
            //$image = $_FILES['image']['name'];
            //$imgContent = addslashes(file_get_contents($image));
            $qry = "SELECT * FROM category WHERE cat_id='$cat_id1'";
            $rslt = $cn->query($qry);
            if ($rslt->num_rows != 0) {
                echo "<script>alert('Category with the mentioned category id already exists!!!');</script>";
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {


                    $qry = "INSERT INTO category (cat_id,cname,img) VALUES (" . $cat_id1 . ",'" . $cname1 . "','" . $filename. "')";
                    $rslt = $cn->query($qry);
                    if ($rslt) {
                        echo "<script>alert('CATEGORY DETAILS SUCCESSFULLY ADDED!!!');</script>";
                        echo '<script>window.location.href="../admin/category.php";</script>';
                    }
                } else {
                    echo "File not uploaded";
                }
            }
        } else {
            echo "<script>alert('Upload supported image format!!!');</script>";
        }
    } else {
        echo "<script>alert('Please select a image to upload!!!');</script>";
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
}
$cn->close();
?>