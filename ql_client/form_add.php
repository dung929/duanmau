<form action="add.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
        <?php if (isset($_GET['name_err'])) : ?>
            <span style="color:red;"><?= $_GET['name_err'] ?></span>
        <?php endif ?>
    </div>
    <div>
        <label for="">Image</label>
        <input type="file" name="image">
        <?php if (isset($_GET['image_err'])) : ?>
            <span style="color:red;"><?= $_GET['image_err'] ?></span>
        <?php endif ?>
    </div>
    <div>
        <label for="">User</label>
        <input type="text" name="user">
        <?php if (isset($_GET['price_err'])) : ?>
            <span style="color:red;"><?= $_GET['price_err'] ?></span>
        <?php endif ?>
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" </div>
        <?php if (isset($_GET['quantity_err'])) : ?>
            <span style="color:red;"><?= $_GET['quantity_err'] ?></span>
        <?php endif ?>
        <div>
            <label for="">Password_2</label>
            <input type="password" name="password_2">
            <?php if (isset($_GET['des_err'])) : ?>
                <span style="color:red;"><?= $_GET['des_err'] ?></span>
            <?php endif ?>
        </div>
        <button>Submit</button>
</form>
