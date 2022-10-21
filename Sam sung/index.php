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
        <h1 class="text-[40px] font-bold text-center mt-[20px]">Sam Sung</h1>
        <?php
        require_once('../db.php');
        $sql = "SELECT * FROM san_pham WHERE id_dm=1";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $sanpham = $statement->fetchAll();
        ?>
        <div class="max-w-7xl mx-auto">
        <div class="main mt-8">
            <div class="admin">
                <div class="user border-2 mb-[20px] rounded-2xl">
                    <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Tài khoản</h2>
                    <div class="log in p-5">
                        <?php
                        session_start();
                        $errors = isset($_GET['errors']) ? $_GET['errors'] : '';
                        ?>
                        <?php if (isset($_SESSION['users'])) { ?>
                            <h1 class="text-2xl mb-[10px]">Đăng nhập thành công!</h1>
                            Chào khách hàng: <?= $_SESSION['users']['user'] ?>!
                            <br>
                            <a href="../client/logout.php"><button class="border-2 rounded-2xl p-2 bg-blue-200 mt-[20px]">Đăng xuất</button></a>
                            <div class="text-blue-500 mt-[10px]">
                                <span class="hover:text-pink-200"><a href="">Đổi mật khẩu</a></span>
                            </div>
                        <?php } else { ?>

                            <form action="../client/login.php" method="POST">
                                <button class="border-2 p-2 rounded-2xl mt-[10px] hover:bg-pink-300 hover:text-white w-full">Đăng
                                    nhập</button>
                            </form>
                        <?php } ?>
                        <div style="color: orange   ;">
                            <?php echo $errors ?>
                        </div>
                    </div>
                </div>
                <div class="border-2 mb-[20px] rounded-2xl">
                    <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Tìm kiếm sản phẩm</h2>
                    <form action="">
                        <div class="p-5">
                            <h3>Hãng điện thoại:</h3>
                            <select name="" id="" class="border-2 rounded-2xl p-1 mt-[5px] mb-[10px]">
                                <option value="">Sam Sung</option>
                                <option value="">Oppo</option>
                                <option value="">Iphone</option>
                                <option value="">Vivo</option>
                                <option value="">LG</option>
                                <option value="">Redmi</option>
                                <option value="">Xiaomi</option>
                            </select>
                            <h3>Giá tiền:</h3>
                            <div class="flex w-full mt-[5px]">
                                <input type="number" placeholder="0" class="border-2 w-[100px]" min="0">-->
                                <input type="number" placeholder="0" class="border-2 w-[100px]" min="0">
                            </div>
                            <button class="border-2 bg-red-200 rounded-2xl p-2 mt-[20px] w-full font-bold text-white">Tìm
                                kiếm</button>
                        </div>
                    </form>
                </div>
                <div class="category">
                    <div class="border-2 rounded-2xl mb-[20px]">
                        <h2 class="border-2 bg-blue-200 p-3 font-bold rounded-2xl">Danh mục</h2>
                        <h2><a href="../Sam sung/index.php?id=1">Sam Sung</a></h2>
                        <hr>
                        <h2><a href="../oppo/index.php?id=2">Oppo</a></h2>
                        <hr>
                        <h2><a href="../iphone/index.php?id=3">Iphone</a></h2>
                        <hr>
                        <h2><a href="../vivo/index.php?id=4">Vivo</a></h2>
                        <hr>
                        <h2><a href="../lg/index.php?id=5">LG</a></h2>
                        <hr>
                        <h2><a href="../redmi/index.php?id=6">Redmi</a></h2>
                        <hr>
                        <h2><a href="../Xiaomi/index.php?id=7">Xiaomi</a></h2>
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
                        <h2 class="text-[30px] font-bold">Sản phẩm mới nhất</h2>
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
                                <span class="block font-bold text-red-500 text-[20px]">Giá tiền:<?=' '. $value['price'] .' '?>$</span>
                                <span class="line-through ">Giảm: 10%</span>
                                <span class="text-red-400 ">--><?= $value['sale'] ?>%</span>
                                <div class="mt-[10px]">
                                    <i class="fas fa-eye"></i>
                                    <span class=""><?= $value['view'].'k'?></span>
                                </div>
                                <div>
                                    <a href="../chitietsanpham/form_chitiet_sp.php?id=<?= $value['id'] ?>" class="border-2 p-2 font-bold rounded-2xl block text-center">
                                        <button>Mua ngay</button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</head>