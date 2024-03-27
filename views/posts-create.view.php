<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<h1>Create posts</h1>

<form method="POST">

    <label>Title:
        <input name="title" value="<?= $_GET["title"] ?? "" ?>"/>
            <?php if(isset($errors["title"])) { ?>
                <p><?= $errors["title"] ?></p>
                    <?php } ?>
    </label>

    <label>Category ID:
        <select name="category_id" >
            <option value="1" >sport</option>
            <option value="2" >music</option>
            <option value="3" >food</option>
        </select>
            <?php if(isset($errors["category_id"])) { ?>
                <p><?= $errors["category_id"] ?></p>
                    <?php } ?>
    </label>

    <button>Poga</button>
</form>

<?php require "components/footer.php" ?>