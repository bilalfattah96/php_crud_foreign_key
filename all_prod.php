<?php
include 'conn.php';
$sql="SELECT * FROM `products`,category WHERE category.c_id = products.c_id";
$result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Prod Name</th>
            <th>Prod Price</th>
            <th>Prod Desc</th>
            <th>Prod Quantity</th>
            <th>Prod Image</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
<?php 
if(mysqli_num_rows($result)> 0){
while($row = mysqli_fetch_array($result)){
?>
        <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><img src="<?php echo 'productImages/'.$row[3]; ?>" height="70" width="70" alt=""></td>
            <td><?php echo $row[9]; ?></td>
            <td><a href="edit.php?id=<?php echo $row[0]; ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row[0]; ?>">Delete</a></td>
        </tr>

        <?php
}
}
else{
   echo "<td colspan='8'> No Products</td>";
}
        ?>
    </table>
</body>
</html>