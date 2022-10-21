<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
$name = $_POST['name'];
$image = $_FILES['image'];
$save = '../img/' . basename($image['name']);
move_uploaded_file($image['tmp_name'], $save);
$price = $_POST['price'];
$describ = $_POST['describ'];
$sale = $_POST['sale'];
$view = $_POST['view'];
$id_dm = $_POST['id_dm'];



$name_err = '';
$image_err = '';
$price_err = '';
$view_err = ''; 
$des_err = '';
$sale_err = '';



if ($name == '') {
    $name_err = 'Vui long khong de trong !';
}
if ($price == '') {
    $price_err = 'Vui long khong de trong !';
} else if ($price <= 0) {
    $price_err = 'Vui long nhap so lon hon 0!';
}
if ($describ == '') {
    $des_err = 'Vui long khong de trong !';
}
if ($sale == '') {
    $sale_err = 'Vui long khong de trong !';
} else if ($sale < 0) {
    $sale_err = 'Vui long nhap so lon hon 0!';
}   
if ($view == '') {
    $view_err = 'Vui long khong de trong !';
} else if ($view < 0) {
    $view_err = 'Vui long nhap so lon hon 0!';
} 
if ($image['size'] >= 2 * 1024 * 1024) {
    $image_err = 'Kich co anh khong duoc qua 2mb!'; 
}


if (!empty($name_err) || !empty($image_err) || !empty($price_err) || !empty($des_err) || !empty($sale_err) || !empty($view_err)) {
    header("location:form_add.php?name_err=$name_err & image_err=$image_err & price_err=$price_err & des_err=$des_err & sale_err=$sale_err & view_err=$view_err");
    die;
}
require_once('../db.php');
$sql="INSERT INTO san_pham (name,price,sale,describ,view,id_dm,image) VALUES ('$name','$price','$sale','$describ','$view','$id_dm','$save')";
$statement = $connect->prepare($sql);

$statement->execute();
header("location:listsp.php");