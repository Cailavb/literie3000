<?php
if (!empty($_POST)) {

    $name = trim(strip_tags($_POST["name"]));
    $picture = trim(strip_tags($_POST["picture"]));
    $size = trim(strip_tags($_POST["size"]));
    $brand = trim(strip_tags($_POST["brand"]));
    $price = trim(strip_tags($_POST["price"]));


    $errors = [];

    if (empty($name)) {
        $errors["name"] = "Le nom du matelas est obligatoire";
    }


    if (!filter_var($picture, FILTER_VALIDATE_URL)) {
        $errors["picture"] = "L'url de l'image est invalide";
    }


    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000;charset=UTF8";
        $db = new PDO($dsn, "root", "");


        $query = $db->prepare("INSERT INTO mattress (name, picture, size, brand, price) VALUES(:name, :picture, :size, :brand, :price)");
        $query->bindParam(":name", $name);
        $query->bindParam(":picture", $picture);
        $query->bindParam(":size", $size);
        $query->bindParam(":brand", $brand);
        $query->bindParam(":price", $price);
        if ($query->execute()) {
            header("Location: index.php");
        };
    }
}

include("templates/header.php");
?>

<h1>Ajouter un nouveau matelas</h1>
<div class="container">
    <form action="" method=post>
        <div class="form-group">
            <label for="inputName">Nom du matelas :</label>
            <input type="text" name="name" id="inputName" value="<?= isset($name) ? $name : "" ?>">
            <?php
            if (isset($errors["name"])) {
            ?>
                <span class="info-error"><?= $errors["name"] ?>
                </span>
            <?php
            }
            ?>
        </div>

        <div class="form-group">
            <label for="inputBrand">Marque du matelas: </label>
            <input type="text" name="name" id="inputBrand" value="<?= isset($name) ? $brand: "" ?>">
            <?php
            if (isset($errors["brand"])){
                ?>
                <span class="info-error"><?= $errors["name"] ?>
                </span>
            <?php    
            }
            ?>

        </div>

        <div class="form-group">
            <label for="">Photo du matelas : </label>
            <input type="text" name="picture" id="inputPicture" value="<?= isset($picture) ? $picture : "" ?>">
            <?php
            if (isset($errors["picture"])) {
            ?>
                <span class="info-error"><?= $errors["picture"] ?>
                </span>
            <?php
            }
            ?>
        </div>

        <div class="form-group">
        <label for="selectSize">Choisissez une dimension : </label>
        <select name="difficulty" id="selectSize">
            <option value="90x190"<?= (isset($size)&& $size === "90x190") ? "selected": ""?>>90x190</option>
            <option value="140x190" <?= (isset($size)&& $size === "140x190") ? "selected": ""?>>140x190</option>
            <option value="160x200"<?= (isset($size)&& $size === "160x200") ? "selected": ""?>>160x200</option>
            <option value="180x200"<?= (isset($size)&& $size === "180x200") ? "selected": ""?>>180x200</option>
            <option value="200x200"<?= (isset($size)&& $size === "200x200") ? "selected": ""?>>200x200</option>
        </select>
        </div>

        <div class="container">
            <form action="" method=post>
                <div class="form-group">
                    <label for="inputPrice">Prix du matelas :</label>
                    <input type="text" name="price" id="inputPrice" value="<?= isset($price) ? $price : "" ?>">
                    <?php
                    if (isset($errors["price"])) {
                    ?>
                        <span class="info-error"><?= $errors["price"] ?>
                        </span>
                    <?php
                    }
                    ?>
                </div>
                <input type="submit" value="Ajouter le matelas" class="btn-literie3000">
    </form>
</div>
<?php
include("templates/footer.php");
?>


             