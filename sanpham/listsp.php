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
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
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
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="listsp.php">Sản phẩm</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../ql_client/list_kh.php">Khách hàng</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../comment/ql_bl.php">Bình luận</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Thống kê</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[20px] font-bold text-center mt-[20px]">Quản lý sản phẩm</h1>
        <?php
        require_once('../db.php');
        $sql = "SELECT san_pham.id,name,price,sale,describ,view,name_dm,image FROM san_pham JOIN danh_muc ON san_pham.id_dm=danh_muc.id";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $sanpham = $statement->fetchAll();
        ?>
        <a href="form_add.php"><button class="border-2 p-3 font-bold rounded-2xl mb-[20px]">Thêm sản phẩm mới</button></a>
        <table class="border-2 text-center">
            <thead class="">
                <tr class="">
                    <th class="border-2 p-3"></th>
                    <th class="mr-[20px] border-2 p-3">ID</th>
                    <th class="ml-[20px] border-2 p-3 ">NAME</th>
                    <th class="ml-[20px] border-2 p-3 ">PRICE</th>
                    <th class="ml-[20px] border-2 p-3 ">SALE</th>
                    <th class="ml-[20px] border-2 p-3 ">DESCRIBE</th>
                    <th class="ml-[20px] border-2 p-3 ">VIEW</th>
                    <th class="ml-[20px] border-2 p-3 ">CATEGORY</th>
                    <th class="ml-[20px] border-2 p-3 ">IMAGE</th>
                    <th class="border-2">Xóa Sửa </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sanpham as $key => $value) : ?>
                    <tr class="p-5 border-2">
                        <td><input type="checkbox" name="" id=""></td>
                        <td class="border-2 p-2"><?= $value['id'] ?></td>
                        <td class="border-2 p-2"><?= $value['name'] ?></td>
                        <td class="border-2 p-2"><?= $value['price'] ?>$</td>
                        <td class="border-2 p-2"><?= $value['sale'] ?>%</td>
                        <td class="border-2 p-2"><?= $value['describ'] ?></td>
                        <td class="border-2 p-4"><?= $value['view'] ?>k<i class="fas fa-eye ml-[8px]"></i></td>
                        <td class="border-2 p-2"><?= $value['name_dm'] ?></td>
                        <td class="border-2 p-2"><img src="<?= $value['image'] ?>" alt="" width="50px"></td>
                        <td class="p-5">
                            <a href="form_update.php?id=<?= $value['id'] ?>" class="border-2 p-2 mr-[10px] font-bold rounded-2xl block mb-[20px]">
                                <button>Sửa sản phẩm</button>
                            </a>
                            <a href="delete.php?id=<?= $value['id'] ?>" class="border-2 p-2 font-bold rounded-2xl block">
                                <button onclick="return confirm('Ban co muon xoa khong?')">Xóa sản phẩm</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</head>