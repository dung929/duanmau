<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
?>
<form action="tnyc_user.php" method='POST'>
    <label for="">Nhập Usename:</label>
    <input type="text" name="email">
    <label for="">Nhập Password:</label>
    <input type="password" name="password">
    <button>Tạo mới</button>
</form>