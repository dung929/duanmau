<?php
session_start();
if (!isset($_SESSION['user'])) {
    $errors = 'Vui lòng đăng nhập để sử dụng';
    header("location:login.php?errors=$errors");
}
require_once('../db.php');
$sql = "SELECT * FROM san_pham";
$statement = $connect->prepare($sql);
$statement->execute();
$sanpham = $statement->fetchAll();
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
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Trang chủ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Giới thiệu</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Liên hệ</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Góp ý</a></li>
                        <li class="p-5 hover:text-blue-500 hover:underline font-bold"><a href="">Hỏi đáp</a></li>
                    </ul>
                </div>
                <div>
                    <form action="" class="inline-block">
                        <input type="text" class="border-2 rounded-2xl" placeholder="Iphone">
                        <button><i class="fas fa-search p-2"></i></button>
                    </form>
                    <i class="fas fa-shopping-cart p-2"></i>
                    <a href="logout.php"><i class="fas fa-sign-out-alt p-2">Đăng xuất</i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="max-w-7xl mx-auto">
        <div class="banner rounded-2xl">
            <img src="../banner.png" alt="" class="img-banner">
        </div>
        <div class=" p-4 rounded-2xl mt-[20px]">
            <marquee behavior="#" direction="left">
                <p class="text-2xl font-bold text-red-500">
                    Chào mừng các bạn đã đến với shop của chúng tôi!!! Rất hân hạnh được tài trợ!!!
                </p>
            </marquee>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="main mt-12">
            <div class="admin">
                <div class="border-2 mb-[20px] rounded-2xl">
                    <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Trang quản trị</h2>
                    <div class="p-5 text-center">
                        <h2><a href="../ql_user/list_user.php" class="border-2 w-full p-2 rounded-2xl bg-red-300 text-white font-bold hover:bg-[aqua] block">Quản trị user</a></h2>
                        <h2><a href="../ql_client/list_kh.php" class="border-2 w-full p-2 rounded-2xl bg-red-300 text-white font-bold hover:bg-[aqua] block">Quản trị khách hàng</a></h2>
                        <h2><a href="../sanpham/listsp.php" class="border-2 w-full p-2 rounded-2xl bg-red-300 text-white font-bold hover:bg-[aqua] block">Quản trị sản phẩm</a></h2>
                        <h2><a href="../danhmuc/listdm.php  " class="border-2 w-full p-2 rounded-2xl bg-red-300 text-white font-bold hover:bg-[aqua] block">Quản trị danh mục</a></h2>
                        <h2><a href="../comment/ql_bl.php  " class="border-2 w-full p-2 rounded-2xl bg-red-300 text-white font-bold hover:bg-[aqua] block">Quản trị bình luận</a></h2>
                    </div>
                </div>
                <div class="category">
                    <div class="border-2 rounded-2xl mb-[20px]">
                        <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Quản lý danh mục</h2>
                        <h2><a href="../danhmuc/listdm.php">Sam Sung</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">Oppo</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">Iphone</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">Vivo</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">LG</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">Redmi</a></h2>
                        <hr>
                        <h2><a href="../danhmuc/listdm.php">Xiaomi</a></h2>
                        <hr>
                        <div class="text-center bg-blue-200 p-4">
                            <form action="" method="post">
                                <input type="text" placeholder="Từ khóa tìm kiếm" class="border-2 p-2 rounded-2xl w-[300px]">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="top-love">
                    <div class="border-2 rounded-2xl">
                        <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Top sản phẩm yêu thích nhất</h2>
                        <div class="p-5">
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                            <div class="flex items-center mb-[10px]">
                                <img src="../Sam sung/images.jpg" alt="" class="w-[30px]">
                                <span class="ml-[15px] text-[12px] text-red-300 hover:underline hover:text-blue-300"><a href="">Samsung Galaxy S22 Ultra (8GB - 128GB)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-[30px]">
                <div class="mb-[30px]">
                    <div class="flex justify-between items-center">
                        <h2 class="text-[30px] font-bold">Quản lý sản phẩm</h2>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <?php foreach ($sanpham as $key => $value) : ?>
                            <div class="item border-2 rounded-2xl p-5">
                                <div class="item2">
                                    <img src="<?= $value['image'] ?>" alt="">
                                    <div class="anh">
                                        <img src="../iphone/tải xuống (4).jpg" alt="">
                                    </div>
                                </div>
                                <h2 class="text-[20px] text-orange-500 mb-[10px] hover:underline hover:text-green-500"><a href="../chitietsanpham/form_chitiet_sp.php?id=<?= $value['id'] ?>"><?= $value['name'] ?></a></h2>
                                <span class="block font-bold">Giá:<?=' ' .$value['price'].' ' ?>$</span>
                                <span class="line-through ">Giảm:2%</span>
                                <span class="text-red-400 ">--><?= $value['sale'] ?>%</span>
                                <div class="mt-[10px]">
                                    <i class="fas fa-eye"></i>
                                    <span class=""><?= $value['view'].'k'?></span>
                                </div>
                                <div>
                                    <a href="../sanpham/form_update.php?id=<?= $value['id'] ?>" class="border-2 p-2 font-bold rounded-2xl block text-center">
                                        <button>Sửa sản phẩm</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
        <footer class="max-w-7xl mx-auto bg-gray-200 py-10 ">
            <div class="py-10 bg-emerald-800 text-gray-200">
                <div class="max-w-7xl mx-auto py-5">
                    <div class="grid grid-cols-3 gap-2 p-5 items-center">
                        <div class="mb-5 mx-10">
                            <h4 class="text-2xl pb-4 hover:text-green-500">Nhóm 9</h4><br>
                            <p>damvnph24792@fpt.edu.vn</p><br>
                            <p>damvnph24792@fpt.edu.vn</p><br>
                            <p>damvnph24792@fpt.edu.vn</p><br>
                            <p>damvnph24792@fpt.edu.vn</p>
                        </div>
                        <div class="mb-5">
                            <h4 class="text-2xl pb-4 hover:text-green-500">Menu</h4><br>
                            <ul class="text-while-500">
                                <li class="pb-4"><i class="fa fa-chevron-right text-green-500"></i><a href="#" class="hover:text-green-500"> Trang Chủ</a></li>
                                <li class="pb-4"><i class="fa fa-chevron-right text-green-500"></i><a href="#" class="hover:text-green-500"> Giới Thiệu</a></li>
                                <li class="pb-4"><i class="fa fa-chevron-right text-green-500"></i><a href="#" class="hover:text-green-500"> Liên Hệ</a></li>
                                <li class="pb-4"><i class="fa fa-chevron-right text-green-500"></i><a href="#" class="hover:text-green-500"> Góp Ý</a></li>
                                <li class="pb-4"><i class="fa fa-chevron-right text-green-500"></i><a href="#" class="hover:text-green-500"> Hỏi Đáp</a></li>
                            </ul>

                        </div>
                        <div class="mb-5">
                            <h4 class="text-2xl pb-4  hover:text-green-500">Tham gia bảng tin</h4>
                            <p class="text-gray-400 mb-5 text-xl">Tham gia ! để cùng trải nghiệm với rất nhiều sản phẩm
                                khác</p>
                            <form action="#" class="flex flex-row flex-wrap">
                                <input type="text" class="text-black  w-2/3 p-2 focus:border-yellow-500" placeholder="email@xample.com" required>
                                <button class="p-2 w-1/3 bg-yellow-500 text-black hover:bg-yellow-600 font-bold">Subscribe</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full bg-emerald-900 text-gray-300 px-10">
                <div class="max-w-7xl flex  flex-row py-4 mx-auto justify-between items-center">
                    <div class="text-center  ">
                        <div>
                            Copyright <strong><span>damvnph24792</span></strong>. All Rights Reserved
                        </div>
                        <div>
                            Designht by <a href="#" class="text-yellow-500">damvnph24792</a>
                        </div>
                    </div>
                    <div class="text-center text-xl text-white mb-2">
                        <a href="#" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-600 mx-1 inline-block pt-1"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-600 mx-1 inline-block pt-1"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-600 mx-1 inline-block pt-1"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-600 mx-1 inline-block pt-1"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-600 mx-1 inline-block pt-1"><i class="fa fa-link"></i></a>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>