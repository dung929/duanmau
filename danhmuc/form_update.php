<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
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
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../index.html">Trang chủ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="listdm.php">Danh mục</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../sanpham/listsp.php">Sản phẩm</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Khách hàng</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Bình luận</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Thống kê</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[20px] font-bold text-center mt-[20px]">Sửa danh mục</h1>
        <?php
        require_once('../db.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM danh_muc WHERE id=$id";
        $statement = $connect->prepare($sql);
        $statement->execute();

        $danh_muc = $statement->fetch();
        ?>

        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $danh_muc['id'] ?>">
            <div>
                <div class="text-[20px] font-bold">Nhập lại Name:</div>
                <input type="text" placeholder='name' name='name_dm' value="<?= $danh_muc['name_dm'] ?>" class="border-2 rounded-2xl p-3" value="abc">
            </div>
            <button type='submit' class="mt-[20px] font-bold border-2 rounded-2xl p-2">Cập nhật</button>
        </form>
    </div>

</body>
</head> 