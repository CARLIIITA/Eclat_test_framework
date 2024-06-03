<?php 

 require_once(__DIR__ . "/../../config/db.php");

if (isset($_POST['name']) && isset($_POST['price'])&& isset($_POST['description']) && $_POST['author']) {
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $author = $_POST['author'];

    $perfumeQuery = "INSERT INTO perfume (name, price, description, author,) VALUES (:title, :article, :auteur)";

    $perfumeStatement = $mysqlClient->prepare($perfumeQuery);

    $perfumeStatement->bindParam(':name', $name);
    $perfumeStatement->bindParam(':price', $price);
    $perfumeStatement->bindParam(':description', $description);
    $perfumeStatement->bindParam(':author', $author);

    $perfumeStatement->execute();

    redirectoRoute('/perfume');
}

require_once(__DIR__ . '/../Views/perfume/perfumeCreate.view.php');