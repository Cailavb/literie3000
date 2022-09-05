<?php
// connexion à la base literie3000
$dsn = "mysql:host=localhost;dbname=literie3000;charset=UTF8";
$db = new PDO($dsn, "root", "");

// Récupérer les données de la base
$query = $db->query("SELECT * FROM mattress");
$mattress = $query->fetchAll(PDO:: FETCH_ASSOC);
// var_dump($mattress);



include("templates/header.php");
?>


    <h1>Catalogue 2022</h1>
    <div class="mattress">
        <?php
        foreach($mattress as $mattres){
            ?>
            <div class="mattres">
            <img src="<?=$mattres["picture"] ?>" alt="">
                <h2>
                  <a href="mattres.php?id=<?= $mattres["id"]?>">  <?=$mattres["name"]?>
                </h2> 
            </div>
            <?php
        }
        ?>
        
    </div>

    <div class="buttonToAdd">
        <button>
            <a href="add_mattress.php?">Ajouter un matelas</a>
        </button>
    </div>
    <?php
    include("templates/footer.php")
    ?>