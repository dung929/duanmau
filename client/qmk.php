
<?php
session_start();
$errors = isset($_GET['errors']) ? $_GET['errors'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login admin</title>
    <link rel="stylesheet" href="styleadm.css">
</head>

<body>
    <h1>
        <span>C</span>
        <span>L</span>
        <span>I</span>
        <span>E</span>
        <span>N</span>
        <span>T</span>
    </h1>
    <br>
    <div class="box">
        <form autocomplete="off" action="tnyc_qmk.php" method="POST">
            <h2>Forgot Password</h2>
            <div class="inputBox">
                <input type="text" required="required" name="user">
                <span>Userame</span>
                <i></i>
            </div>
            <input type="hidden" required="required" name="password">
            <div class="links">
                <a href="../ql_client/form_add.php">Đăng ký</a>
                <a href="login.php">Đăng nhập</a>
            </div>  

            <input type="submit" value="Login">
        </form>
    </div>
    <div style="color: orange   ;">
        <?php echo $errors ?>
    </div>
</body>

</html>