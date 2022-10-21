<?php
session_start();
if (!isset($_SESSION['users'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location:../client/login.php?errors=$errors");
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
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <header>
        <div class="max-w-7xl mx-auto">
            <div class="p-5 flex justify-between items-center">
                <div class="w-[200px]">
                    <img src="../abc.jpg" alt="">
                </div>
                <div>
                    <ul class="flex">
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="../client/index.php">Trang chủ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Giới thiệu</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Liên hệ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Góp ý</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Hỏi đáp</a></li>
                    </ul>
                </div>
                <div>
                    <i class="fas fa-search p-2"><a href="abc.php"></a></i>
                    <a href="../cart/index.php"><i class="fas fa-shopping-cart p-2"></i></a>
                    <a href="../user/login.php"><i class="fas fa-user p-2"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <div class="banner rounded-2xl">
            <img src="../banner.png" alt="" class="img-banner">
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-[30px] font-bold  mt-[20px]">Giỏ hàng</h1>
        <?php
        require_once('../db.php');
        $sql = "SELECT * FROM cart";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $cart = $statement->fetchAll();
        $tongtien = 0;
        $sumtt = 0;
        ?>
        <button class="border-2 p-3 rounded-2xl bg-blue-300 text-white font-bold mb-[20px]"><a href="../client/index.php">Mua thêm</a></button>
        <table class="border-2 text-center">
            <thead class="">
                <tr class="">
                    <th class="ml-[20px] border-2 p-3 ">STT</th>
                    <th class="ml-[20px] border-2 p-3 ">NAME</th>
                    <th class="ml-[20px] border-2 p-3 ">PRICE</th>
                    <th class="ml-[20px] border-2 p-3 ">NUMBER</th>
                    <th class="border-2">SUM</th>
                    <th class="border-2">DELETE</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($cart as $key => $value) :
                    $sumtt = $value['price_cart'] * $value['number'];
                    $tongtien += $sumtt ?>
                    <tr class="p-5 border-2">
                        <td class="border-2 p-2"><?= $value['id_cart'] ?></td>
                        <td class="border-2 p-2"><?= $value['name_cart'] ?></td>
                        <td class="border-2 p-2"><?= $value['price_cart'] ?>$</td>
                        <td class="border-2 p-2"><?= $value['number'] ?></td>
                        <td class="border-2"><?= $value['sum'] ?>$</td>
                        <td class="p-5">
                            <a href="delete.php?id_cart=<?= $value['id_cart'] ?>" class="border-2 p-2 font-bold rounded-2xl">
                                <button onclick="return confirm('Ban co muon xoa khong?')">Xóa đơn hàng</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table> 
        <h2 class="font-bold mt-[30px] ">Tổng tiền:<?php echo ' ' . $tongtien . '$'.' = '. $tongtien*23000 .' VND' ?></h2>
        <button class="border-2 p-3 rounded-2xl bg-blue-300 text-white font-bold mt-[20px]"><a href="../post_tt/form_post.php">Đặt mua</a></button>
    </div>
</body>
</head> 