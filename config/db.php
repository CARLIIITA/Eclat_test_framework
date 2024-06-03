<?php 
try{
    $mysqlClient = new PDO ('mysql:host=localhost;dbname=eclat_de_senteur;charset=utf8','root');

}catch (Exception $e){

    die('ERREUR : ' . $e ->getMessage());
}