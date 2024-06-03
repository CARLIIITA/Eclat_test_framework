<?php 

if(
   isset($_GET['id'])){
   $id = $_GET['id'];


$userQuery = "SELECT * FROM user WHERE id = :id ";
$userStatement = $mysqlClient -> prepare($userQuery);
$userStatement ->bindParam(':id', $id );
$userStatement ->execute();
$user = $userStatement ->fetch();

}

if (
    isset($_POST['pseudo']) && 
    isset($_POST['email'])    
) {

$name =  $_POST['pseudo'];
$email = $_POST ['email'];

$updateQuery = "UPDATE user SET pseudo = :pseudo, email =:email WHERE id = :id";

$updateStatement = $mysqlClient ->prepare($perfumeQuery);
$updateStatement ->bindParam(':pseudo', $name);
$updateStatement ->bindParam(':email', $email);
$updateStatement ->bindParam(':id', $id);
$updateStatement ->execute();

redirectoRoute("/admin");

}
require_once(__DIR__. '/../Views/admin/updateadmin.view.php');
?>