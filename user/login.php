<?php
session_start();

$errors = isset($_GET['errors']) ? $_GET['errors'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://kit.fontawesome.com/e123c1a84c.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: black;
        }

        .admin {
            height: 100%;
            box-sizing: border-box;
            margin: 0 auto;
            padding: 50px;
            align-items: center;
            border: 1px solid black;
            background-image: url("https://thumbs.gfycat.com/MilkyColdIndianhare-size_restricted.gif");
            margin-top: 120px;
        }

        img {
            width: 100%;
        }

        .logo {
            display: block;
            text-align: center;
        }

        .table {

            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: aqua;

            text-decoration: underline red;
        }

        h2 {
            color: pink;
            font-weight: 700;
            font-size: 15px;
        }

        input {
            border: 1px solid white;
            background: transparent;
            padding: 10px;
            border-radius: 10px;
            color: white;
        }

        button {
            margin-top: 20px;
            background-color: transparent;
            color: white;
            font-weight: 700;
            padding: 10px;
            border-radius: 10px;
        }

        button:hover {
            background-color: aqua;
            color: red;

        }

        .checkbox {
            color: white;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="admin">
        <div class="table">
        <div style="color: orange   ;">
        <?php echo $errors ?>
    </div>
            <h1>SIGN IN</h1>
            <?php if (isset($_SESSION['user'])) { ?>
                <h2>Chào mừng quản trị....: <?= $_SESSION['user']['email'] ?>! </h2>
                <a href="logout.php"><button>Đăng xuất</button></a>
                <div>
                    <a href="../ql_user/list_user.php"><button>Quản trị user</button></a>
                    <br>
                    <a href="../sanpham/listsp.php"><button>Quản lý sản phẩm</button></a>
                    <br>
                    <a href="../danhmuc/listdm.php"><button>Quản lý danh mục</button></a>
                </div>
            <?php } else { ?>
                <form action="post_login.php" method="POST">
                    <div class="a">
                        <h2>Nhập Username</h2>
                        <input type="text" name="email">
                    </div>
                    <?php if (isset($_GET['e_errors'])) : ?>
                        <span style="color:red;"><?= $_GET['e_errors'] ?></span>
                    <?php endif ?>
                    <div>
                        <h2>Nhập Password</h2>
                        <input type="password" name="password">
                    </div>
                    <?php if (isset($_GET['p_errors'])) : ?>
                        <span style="color:red;"><?= $_GET['p_errors'] ?></span>
                    <?php endif ?>
                    <div class="checkbox">
                        <input type="checkbox">Nhớ mật khẩu
                    </div>
                    <button>Đăng nhập</button>
                </form>
                <button>Quên mật khẩu</button>
            <?php } ?>
        </div>
    </div>

</body>

</head>