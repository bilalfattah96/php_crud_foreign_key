<?php
include('conn.php');
$id = $_GET['id'];
$sqlSelect = "SELECT * FROM `products`,category WHERE category.c_id = products.c_id AND p_id = $id";
$result = mysqli_query($conn, $sqlSelect);
$row = mysqli_fetch_array($result);
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
        Prod Name <input type="text" name="pname" value="<?php echo $row[1]; ?>"> <br> <br>
        Prod Price <input type="number" name="pprice" value="<?php echo $row[2]; ?>"><br> <br>
        Prod Image <input type="file" name="img"><br> <br>
        Prod Category <select name="c_id" id="">

            <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
            <?php
            $sqlRemainingCat = "SELECT * FROM `category` WHERE c_id !=" . $row['c_id'];
            $res = mysqli_query($conn, $sqlRemainingCat);

            while ($recat =  mysqli_fetch_array($res)) {
            ?>
                <option value="<?php echo $recat['c_id']; ?>"><?php echo $recat['c_name']; ?></option>
            <?php
            }
            ?>
        </select><br> <br>
        Prod Desc <textarea type="text" name="pdesc"><?php echo $row[4]; ?></textarea><br> <br>
        Prod Qty <input type="number" name="pqty" value="<?php echo $row[7]; ?>"><br> <br>
        <input type="submit" value="Add Product" name="addProd">
    </form>
</body>

</html>