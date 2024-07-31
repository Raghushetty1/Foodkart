<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <form style="float:left; margin:5%; padding:4%; border:2px solid black; border-radius: 15px" action=" " method="post" enctype="multipart/form-data">
    <h3>ADD ITEM DETAILS</h3>
    <div class="mb-3">
        <label for="cid" class="form-label">Category id:</label>
        <select class="form-select" id="cid" name="cid" aria-label="Default select example">
                    <option selected>Select category id</option>
                    <?php
                    include "../con_db.php";
                    $qry="select cat_id from category";
                    $result=$cn->query($qry);
                    $i=0;
                    while($r=$result->fetch_assoc())
                    { 
                        $i++;
                    ?>
                    <option value="<?php echo $r['cat_id']; ?>"> <?php echo $r['cat_id'];?></option>
                    <?php } ?>
        </select>    
    </div>

    <div class="mb-3">
        <label for="iid" class="form-label">Item id:</label>
        <input type="number" name="iid" min="1" max="200" placeholder="Enter the item id" class="form-control" id="iid">
    </div>

    <div class="mb-3">
        <label for="iname" class="form-label">Item name:</label>
        <input type="text" name="iname" maxlength="20" placeholder="Enter the item name" class="form-control" id="iname">
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label">Food description:</label>
        <input type="textarea" maxlength="40"  name="desc" placeholder="Enter the item description"class="form-control" id="desc">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" name="price" placeholder="Enter the item price" class="form-control" id="price">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Upload image</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>      
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
include("../con_db.php");

if(isset($_POST['submit']))
{
   
    $cat_id1=$_POST['cid'];
    $iid1=$_POST['iid'];
    $iname1=$_POST['iname'];
    $desc1=$_POST['desc'];
    $price1=$_POST['price'];
    if(!empty($_FILES['image']['name']))
    {
        //get file info
        $filename=basename($_FILES['image']['name']);
        //$filename1=basename($_FILES['image']['tmp_name']);
        //echo $filename;
        // echo $filename1;
        $target="../images/".$filename;
        //echo $target;
        $filetype=pathinfo($filename,PATHINFO_EXTENSION);
        //Allow certain file formats
        $allowtypes=array('jpg','png','jpeg','gif');
        if(in_array($filetype,$allowtypes))
        {
           
            //$image=$_FILES['image']['name'];
            //echo $image;
            //$imgContent=addslashes(file_get_contents($image));
            //echo $imageContent;
            //echo $_FILES['image']['tmp_name'];
            $qry="select * from item where iid=".$iid1;
            $rslt=$cn->query($qry);
            if($rslt->num_rows!=0)
            {
                echo"<script>alert('Item with the mentioned item id already exists!!!');</script>";
            }
            else
            {
                if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            
                
                $qry="INSERT into item(cid,iid,iname,descrip,price,img) values(".$cat_id1.",".$iid1.",'".$iname1."','".$desc1."',".$price1.",'".$filename."')";
                //echo $qry;
                @$rslt=$cn->query($qry);
                    if($rslt)
                    {
                     
                        
                        
                        echo"<script>alert('ITEM DETAILS SUCCESSFULLY ADDED!!!');</script>";
                        //header('location:item.php');
                        echo '<script>window.location.href="../admin/item.php";</script>';
                        

                    }
                }
                    else{
                        echo"File not uploaded";
                    }
            }

        }
        else
        {
            echo"<script>alert('Upload supported image format!!!');</script>";
        }
    }
    else
    {
        echo"<script>alert('Please select a image to upload!!!');</script>";
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