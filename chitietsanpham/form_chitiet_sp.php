
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
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
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
                    <form action="" class="inline-block">
                        <input type="text" class="border-2 rounded-2xl" placeholder="Iphone">
                        <button><i class="fas fa-search p-2"></i></button>
                    </form>
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
        <div class=" p-4 rounded-2xl mt-[20px]">
            <marquee behavior="#" direction="left">
                <p class="text-2xl font-bold text-red-500">
                    Chào mừng các bạn đã đến với shop của chúng tôi!!! Rất hân hạnh được tài trợ!!!
                </p>
            </marquee>
        </div>
    </div>
    <style>
        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 20px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked~label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked~label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked~label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>
    </head>

    <body>

        <div class="max-w-7xl mx-auto">
            <?php
            require_once('../db.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM san_pham WHERE id= $id";

            $statement = $connect->prepare($sql);

            $statement->execute();
            $san_pham = $statement->fetch();
            ?>

            <form action="../cart/cart.php" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 items-center gap-4">
                    <div class="img">
                        <div>
                            <img src="<?= '../img/' . $san_pham['image'] ?>" alt="" class="w-full">
                            <input type="hidden" name="image">
                        </div>
                    </div>
                    <div class="information ">
                        <div>
                            <input type="hidden" name="id" value="<?= $san_pham['id'] ?>">
                        </div>
                        <div>
                            <h2 name="name" class=" text-[30px] text-red-500 font-bold mb-[10px]"> <?= $san_pham['name'] ?></h2>
                            <input type="hidden" name="name" value="<?= $san_pham['name'] ?>">
                        </div>
                        <p class="text-neutral-400 mb-[15px]">999+ review</p>
                        <div class="text-[25px]">
                            <label for="">Giá hiện tại: </label>
                            <h2 name="price" class="mb-[10px] text-orange-500 inline-block"><?= $san_pham['price'] ?>$</h2>
                            <input type="hidden" name="price" value="<?= $san_pham['price'] ?>">
                        </div>
                        <p class="text-neutral-400 mb-[15px]">Đảm bảo 100% hàng chất lượng cao uy tín!!!</p>
                        <div>
                            <label for="">Mô tả:</label>
                            <h2 class="border-2 rounded-2xl p-5 mb-[20px]  inline-block"><?= $san_pham['describ'] ?></h2>
                        </div>
                        <div>
                            <label for="">Số lượng</label>
                            <input type="number" name='number' min=1 class="mb-[15px] border-2 rounded-2xl text-center" value="1">
                        </div>

                        <button class="border-2 p-3 rounded-2xl font-bold"><i class="fas fa-shopping-cart p-2"></i> Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </form>
            <div class="border-2 rounded-2xl p-5 mt-[20px]">
                <form action="../comment/add_bl.php" method="POST">
                    <?php if (isset($_GET['abc'])) : ?>
                        <span style="color:red;"><?= $_GET['abc'] ?></span>
                    <?php endif ?>
                    <h2>Phiếu đánh giá</h2>
                    <div class="stars">
                        <input class="star star-5" id="star-5" type="radio" name="star" />
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" />
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" />
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" />
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" />
                        <label class="star star-1" for="star-1"></label>
                    </div>
                    <h3>Bình luận</h3>
                    <input type="text" name="content" class="w-full h-[200px] border-2 rounded-2xl bg-pink-300 mb-[20px]">
                    <h3>Ngày bình luận</h3>
                    <input type="date" name="date" id="" class=" border-2 rounded-2xl p-3 mt-[10px]">
                    <input type="hidden" name="id" value="<?= $san_pham['id'] ?>">
                    <button class="border-2 block rounded-2xl p-3 mt-[20px] bg-[aqua] font-bold text-white hover:text-red-300">Gửi</button>

                </form>
            </div>
        </div>
    </body>