<?php
session_start();
if (!isset($_SESSION['users'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location:../client/login.php?errors=$errors");
}
?>
<?php 
require_once('../db.php');
$id = $_GET['id_cart'];
$sql = "DELETE FROM cart WHERE id_cart=$id";

$statement = $connect ->prepare($sql);

$statement->execute();

header("location:index.php");