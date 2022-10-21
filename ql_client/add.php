<?php
$name = $_POST['name'];
$image = $_FILES['image'];
$save = '../img/' . basename($image['name']);
move_uploaded_file($image['tmp_name'], $save);
$user = $_POST['user'];
$password = $_POST['password'];
$password_2 = $_POST['password_2'];




$name_err = '';
$image_err = '';
$price_err = '';
$quantity_err = '';
$des_err = '';



if ($name == '') {
    $name_err = 'Vui long khong de trong !';
}
if ($user == '') {
    $price_err = 'Vui long khong de trong !';
} 
if ($password == '') {
    $des_err = 'Vui long khong de trong !';
}
if ($password_2 == '') {
    $quantity_err = 'Vui long khong de trong !';
} else if($password != $password_2){
    $des_err = 'Mật khẩu nhập lại không đúng !';
} 
if ($image['size'] >= 2 * 1024 * 1024) {
    $image_err = 'Kich co anh khong duoc qua 2mb!'; 
}


if (!empty($name_err) || !empty($image_err) || !empty($price_err) || !empty($des_err) || !empty($quantity_err)) {
    header("location:form_add.php?name_err=$name_err & image_err=$image_err & price_err=$price_err & des_err=$des_err & quantity_err=$quantity_err");
    die;
}
$password_hashed = password_hash($password, PASSWORD_BCRYPT);
require_once('../db.php');
$sql="INSERT INTO client (name,user,password,image) VALUES ('$name','$user','$password_hashed','$save')";
$statement = $connect->prepare($sql);

$statement->execute();
header("location:../client/login.php");