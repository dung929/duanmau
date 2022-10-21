<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
require_once('../db.php');

 $tenloai = $_POST['tenloai'];


 $name_err = '';
 if($tenloai==''){
   $name_err="*Vui lòng không để trống!";
 }
 if(!empty($name_err)){
   header("location:add.php?name_err=$name_err");
   die;
 }
 $sql = "INSERT INTO danh_muc (name_dm) VALUES ('$tenloai')";
 $statement = $connect->prepare($sql);
 $statement->execute();
 header('location:listdm.php');