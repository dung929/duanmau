<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
require_once('../db.php');
$id = $_GET['id'];
$sql = "DELETE FROM san_pham WHERE id=$id";

$statement = $connect ->prepare($sql);

$statement->execute();

header("location:listsp.php");