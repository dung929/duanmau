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
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Khách hàng</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../comment/ql_bl.php">Bình luận</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Thống kê</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[20px] font-bold text-center mt-[20px]">Quản lý khách hàng</h1>
        <?php
        require_once('../db.php');
        $sql = "SELECT * FROM client";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $client = $statement->fetchAll();
        ?>
        <table class="border-2 text-center">
            <thead class="">
                <tr class="">
                    <th class="border-2 p-3"></th>
                    <th class="mr-[20px] border-2 p-3">ID</th>
                    <th class="ml-[20px] border-2 p-3 ">NAME</th>
                    <th class="ml-[20px] border-2 p-3 ">USER</th>
                    <th class="ml-[20px] border-2 p-3 ">PASSWORD</th>
                    <th class="ml-[20px] border-2 p-3 ">IMAGE</th>
                    <th class="border-2">Xóa Sửa </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($client as $key => $value) : ?>
                    <tr class="p-5 border-2">
                        <td><input type="checkbox" name="" id=""></td>
                        <td class="border-2 p-2"><?= $value['id'] ?></td>
                        <td class="border-2 p-2"><?= $value['name'] ?></td>
                        <td class="border-2 p-2"><?= $value['user'] ?></td>
                        <td class="border-2 p-2"><?= $value['password'] ?></td>
                        <td class="border-2 p-2"><img src="<?= $value['image'] ?>" alt="" width="50px"></td>
                        <td class="p-5">
                            <a href="delete.php?id=<?= $value['id'] ?>" class="border-2 p-2 font-bold rounded-2xl">
                                <button onclick="return confirm('Ban co muon xoa khong?')">Xóa khách hàng</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</head>