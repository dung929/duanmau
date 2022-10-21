<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
$connect = new PDO(
   'mysql:host=127.0.0.1;dbname=duanmau',
   'root',
   ''
);
$id = $_GET['id'];

$sql = "DELETE FROM danh_muc WHERE id=$id";

$statement = $connect->prepare($sql);
$statement->execute();
header('location:listdm.php');