<?php
include 'conn.php';
$sqlCat = "SELECT * FROM `category`";
$result = mysqli_query($conn,$sqlCat);

if(isset($_POST['addProd'])){
    $pn= $_POST['pname'];
    $cid= $_POST['c_id'];
    $pp= $_POST['pprice'];
    $imgn = $_FILES['img']['name'];
    $imgt = $_FILES['img']['tmp_name'];
    $pd = $_POST['pdesc'];
    $pq = $_POST['pqty'];
    move_uploaded_file($imgt,'productImages/'.$imgn);
    $sqlProd = "INSERT INTO `products`( `p_name`, `p_price`, `p_img`, `p_desc`, `c_id`, `p_qty`) VALUES ('$pn','$pp','$imgn','$pd','$cid','$pq')";
    mysqli_query($conn,$sqlProd);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
      Prod Name  <input type="text" name="pname"> <br> <br>
      Prod Price    <input type="number" name="pprice"><br> <br>
      Prod Image   <input type="file" name="img"><br> <br>
      Prod Category <select name="c_id" id="">
        <?php 
            while($row = mysqli_fetch_array($result)){
        ?>
            <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
            <?php
            }
            ?>
        </select><br> <br>
        Prod Desc   <input type="text" name="pdesc"><br> <br>
        Prod Qty   <input type="number" name="pqty"><br> <br>
        <input type="submit" value="Add Product" name="addProd">
    </form>
</body>
</html>