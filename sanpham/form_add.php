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
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Trang chủ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../danhmuc/listdm.php">Danh mục</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="listsp.php">Sản phẩm</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Khách hàng</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Bình luận</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Thống kê</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <?php
    require_once('../db.php');
    $sql = "SELECT name_dm,danh_muc.id FROM san_pham JOIN danh_muc";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $sanpham = $statement->fetchAll();
    ?>
    <div class="max-w-7xl mx-auto">
        <div>
            <h2 class="text-3xl font-bold">Thêm mới sản phẩm</h2>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div>
                    <h3>Mã sản phẩm</h3>
                    <input type="text" name="maloai" class="border-2 rounded-2xl" disabled>
                </div>
                <div>
                    <h3>Tên sản phẩm</h3>
                    <input type="text" name="name" class="border-2 rounded-2xl">
                    <?php if (isset($_GET['name_err'])) : ?>
                        <span style="color:red;"><?= $_GET['name_err'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <h3>Giá sản phẩm</h3>
                    <input type="number" name="price" class="border-2 rounded-2xl" min=1>
                    <?php if (isset($_GET['price_err'])) : ?>
                        <span style="color:red;"><?= $_GET['price_err'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <h3>Giảm giá</h3>
                    <input type="number" name="sale" class="border-2 rounded-2xl" min=0>
                    <?php if (isset($_GET['sale_err'])) : ?>
                        <span style="color:red;"><?= $_GET['sale_err'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <h3>Mô tả</h3>
                    <input type="text" name="describ" class="border-2 rounded-2xl">
                    <?php if (isset($_GET['des_err'])) : ?>
                        <span style="color:red;"><?= $_GET['des_err'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <h3>Lượt xem</h3>
                    <input type="number" name="view" class="border-2 rounded-2xl">
                    <?php if (isset($_GET['view_err'])) : ?>
                        <span style="color:red;"><?= $_GET['view_err'] ?></span>
                    <?php endif ?>
                </div>
                <div>
                    <h3>Danh mục</h3>

                    <input type="radio" name="id_dm" value="1" checked>Sam Sung
                    <input type="radio" name="id_dm" value="2">Oppo
                    <input type="radio" name="id_dm" value="3">Iphone
                    <input type="radio" name="id_dm" value="4">Vivo
                    <input type="radio" name="id_dm" value="5">LG
                    <input type="radio" name="id_dm" value="6">Redmi
                    <input type="radio" name="id_dm" value="7">Xixaomi
                </div>
                <div>
                    <h3>Ảnh sản phẩm</h3>
                    <input type="file" name="image" class="border-2 rounded-2xl p-2">
                    <?php if (isset($_GET['image_err'])) : ?>
                        <span style="color:red;"><?= $_GET['image_err'] ?></span>
                    <?php endif ?>
                </div>
                <button class="border-2 rounded-2xl p-2 mt-[20px]">Thêm mới</button>
                <input type="reset" value="Reset" class="ml-[10px] border-2 p-2 rounded-2xl">
            </form>
        </div>
    </div>