<?php
session_start();
if (!isset($_SESSION['users'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location:../client/login.php?errors=$errors");
}
?>
<?php
$name = $_POST['name'];
$image = $_FILES['image'];
$price = $_POST['price'];
$number= $_POST['number'];
$sum = $number * $price;
require_once('../db.php');
$sql="INSERT INTO cart (name_cart,price_cart,image_cart,number,sum) VALUES ('$name','$price','$image','$number','$sum')";
$statement = $connect->prepare($sql);

$statement->execute();
header("location:index.php");