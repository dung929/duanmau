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
        <h2 class="mt-[30px] font-bold text-center text-[30px] ">Thông tin liên hệ</h2>
        <form action="">
            <div class="grid grid-cols-2 gap-8 border-2 p-3 bg-pink-400 rounded-2xl">
                <div>
                    <div>
                        <h2 class="font-bold mb-[8px]">Họ</h2>
                        <input type="text" name="ho_kh" required class="rounded-2xl text-center border-none">
                    </div>
                    <div>
                        <h2 class="font-bold mb-[8px]">Địa chỉ</h2>
                        <input type="text" name="address" required class="rounded-2xl text-center border-none">
                    </div>
                </div>
                <div>
                    <div>
                        <h2 class="font-bold mb-[8px]">Tên</h2>
                        <input type="text" name="name_kh" required class="rounded-2xl text-center border-none">
                    </div>
                    <div>
                        <h2 class="font-bold mb-[8px]">Số điện thoại</h2>
                        <input type="number" name="phone" required class="rounded-2xl text-center border-none">
                    </div>
                </div>
            </div>
            <button class="mt-[20px] border-2 rounded-2xl p-3 bg-[aqua] font-bold text-red-500" onclick="<?php echo 'Ban co muon xoa khong?' ?>">Submit</button>
            <button type="reset" class="mt-[20px] border-2 rounded-2xl p-3 bg-red-200 font-bold text-red-500">Nhập lại</button>
        </form>
    </div>