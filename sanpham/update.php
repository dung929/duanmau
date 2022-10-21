<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
$id = $_POST['id'];
$name = $_POST['name'];
$image = $_FILES['image'];
$save = '../img/' . basename($image['name']);
move_uploaded_file($image['tmp_name'], $save);
$price = $_POST['price'];
$sale = $_POST['sale'];
$describ = $_POST['describ'];
$id_dm = $_POST['id_dm'];
$view = $_POST['view'];

require_once('../db.php');

$sql = "UPDATE san_pham SET name='$name',price='$price',sale='$sale',describ='$describ',view='$view',id_dm='$id_dm',image='$save' WHERE id=$id";
$statement = $connect->prepare($sql);

$statement->execute();
header("location:listsp.php");