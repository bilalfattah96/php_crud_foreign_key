<?php
include 'conn.php';
if(isset($_POST['addCat'])){
    $cn = $_POST['cat_name'];
    $sql ="INSERT INTO `category`( `c_name`) VALUES ('$cn')";
  $result =  mysqli_query($conn,$sql);
  if($result){
echo '<script>alert("Inserted")</script>';
  }
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
    <form action="" method="post">
        <input type="text" name="cat_name"> <br> <br>
        <input type="submit" value="Add Category" name="addCat">
    </form>
</body>
</html>