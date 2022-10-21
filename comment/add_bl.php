<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
require_once('../db.php');
$content = $_POST['content'];
$date = $_POST['date'];
$id=$_POST['id'];
$content_err = '';
if ($content == '') {
    $content_err = "*Vui lòng không để trống!";
}
if (!empty($content_err)) {
    header("location:add_bl.php?content_err=$content_err");
    die;
}
$sql = "INSERT INTO comment(id_sp,content,date) VALUES ('$id','$content','$date')";
$statement = $connect->prepare($sql);
$statement->execute();
header("location:../chitietsanpham/form_chitiet_sp.php?id=$id");
