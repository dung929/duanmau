<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
$email = $_POST['email'];
$password = $_POST['password']; 
$errors = '';
if ($email== '') {
    $errors = $errors . 'User không được để trống!.';
}
if ($password == '') {
    $errors .= 'Password không được để trống!.';
}
if ($errors != '') {
    header("location: form_tao_user.php?errors=$errors");
} else {
$password_hashed = password_hash($password, PASSWORD_BCRYPT);
require_once('../db.php');
$sql = "INSERT INTO users (email, password) "
    . "VALUES ('$email', '$password_hashed')";
$statement = $connect->prepare($sql);
$statement->execute();
header('location:list_user.php');
}
?>
<div style="color: orange   ;">
    <?php echo $errors ?>
</div>