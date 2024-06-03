<?php 

if (isset($_GET['id'])){
    $id = $_GET['id'];

$perfumeQuery = " SELECT * FROM  perfume WHERE id = :id ";
$perfumeStatement = $mysqlClient-> prepare($perfumeQuery);
$perfumeStatement ->bindParam(':id', $id);
$perfumeStatement ->execute();

$perfume = $perfumeStatement ->fetch();

if (!$perfume) {
    http_response_code(404);
 require_once(__DIR__ . "/404.php");
 exit;   
} 
} else {
    http_response_code(404);
 require_once(__DIR__ . "/404.php");
 exit;   
}
require_once(__DIR__. '/../Views/perfume/perfumeRead.view.php');