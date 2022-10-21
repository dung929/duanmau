<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
require_once('../db.php');
$sql = 'SELECT * FROM users';
$statement = $connect->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="max-w-7xl mx-auto">
            <div class="">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl mb-[20px]">Admin</h1>
                    <a href="../user/logout.php"><i class="fas fa-sign-out-alt p-2">Đăng xuất</i></a>
                </div>
                <div>
                    <ul class="flex bg-black text-white">
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../user/index.php">Trang chủ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../danhmuc/listdm.php">Danh mục</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../sanpham/listsp.php">Sản phẩm</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../ql_client/list_kh.php">Khách hàng</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../comment/ql_bl.php">Bình luận</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Thống kê</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[20px] font-bold text-center mt-[20px]">Quản lý người dùng</h1>
        <a href="form_tao_user.php" class="border-2 p-3 font-bold rounded-2xl mb-[20px]">New User</a>
        <table class="border-2 text-center mt-[30px]">
            <thead>
                <tr>
                    <th class="mr-[20px] border-2 p-3">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $value) : ?>
                    <tr>
                        <td class="mr-[20px] border-2 p-3"><?= $value['email'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>