<?php 

require_once(__DIR__ . '/../../config/db.php');

$perfumeQuery = "SELECT * FROM perfume";


$perfumeStatement = $mysqlClient->prepare($perfumeQuery);

$perfumeStatement ->execute();


$perfumes = $perfumeStatement->fetchAll();


require_once(__DIR__ . '/../Views/perfume/perfume.view.php');

?>