<?php
include 'conn.php';
$sqlCat = "SELECT * FROM `category`";
$result = mysqli_query($conn,$sqlCat);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
      Prod Name  <input type="text" name="pname"> <br> <br>
      Prod Price    <input type="number" name="pprice"><br> <br>
      Prod Image   <input type="file" name="img"><br> <br>
      Prod Category <select name="" id="">
        <?php 
            while($row = mysqli_fetch_array($result)){
        ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
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