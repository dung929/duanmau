<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location: ../user/login.php?errors=$errors");
}
?>
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
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[20px] font-bold text-center mt-[20px]">Sửa sản phẩm</h1>
        <?php
        require_once('../db.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM san_pham WHERE id= $id";

        $statement = $connect->prepare($sql);

        $statement->execute();
        $san_pham = $statement->fetch();
        ?>

        <form action="update.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="id" value="<?= $san_pham['id'] ?>">
            </div>
            <div>
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $san_pham['name'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image" value="<?= $san_pham['image'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div>
                <label for="">Price</label>
                <input type="number" name="price" value="<?= $san_pham['price'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div>
                <label for="">Sale</label>
                <input type="number" name="sale" value="<?= $san_pham['sale'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div>
                <label for="">Describ</label>
                <input type="text" name="describ" value="<?= $san_pham['describ'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div>
                <label for="">View</label>
                <input type="number" name="view" value="<?= $san_pham['view'] ?>" class="border-2 p-2 rounded-2xl mb-[10px]">
            </div>
            <div class="mb-[20px]">
                <label for="id_dm">
                    <input type="radio" name="id_dm" value="1" <?php if ($san_pham['id_dm'] == 1) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Sam Sung
                    <input type="radio" name="id_dm" value="2" <?php if ($san_pham['id_dm'] == 2) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Oppo
                    <input type="radio" name="id_dm" value="3" <?php if ($san_pham['id_dm'] == 3) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Iphone
                    <input type="radio" name="id_dm" value="4" <?php if ($san_pham['id_dm'] == 4) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Vivo
                    <input type="radio" name="id_dm" value="5" <?php if ($san_pham['id_dm'] == 5) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">LG
                    <input type="radio" name="id_dm" value="6" <?php if ($san_pham['id_dm'] == 6) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Redmi
                    <input type="radio" name="id_dm" value="7" <?php if ($san_pham['id_dm'] == 7) {
                                                                    echo 'checked';
                                                                } ?> class="mr-[10px]">Xixaomi
                </label>
            </div>
            <button class="border-2 p-3 rounded-2xl font-bold">Submit</button>
        </form>
    </div>
</body>
