<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
require_once('../db.php');
$id = $_POST['id'];
$name_dm = $_POST['name_dm'];

$sql = "UPDATE danh_muc SET name_dm='$name_dm' WHERE id=$id";

$statement = $connect->prepare($sql);
$statement->execute();
header('location: listdm.php');