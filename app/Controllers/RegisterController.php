<?php 

if(
isset($_POST['pseudo']) && 
isset($_POST['email']) && 
isset($_POST['password'])

) {

$pseudo = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = "Invalid Email";
    require_once(__DIR__ . '/../Views/register.view.php');
    exit;
}

$userQuery = "SELECT * FROM user WHERE  email = :email"; 
$userStatement = $mysqlClient-> prepare ($userQuery);
$userStatement ->bindParam (':email' , $email);
$userStatement ->execute ();


$user = $userStatement ->fetch();


if ($user) {
    $error = "Email deja existant";

}else{

    $passwordValid = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password);
    if ($passwordValid) { 
    $userQuery = "INSERT INTO user (pseudo,email,password) VALUES (:pseudo, :email, :password)";

    $userStatement = $mysqlClient ->prepare($userQuery);
    
    $userStatement->bindParam(':pseudo', $pseudo);
    $userStatement->bindParam(':email', $email);
    $userStatement->bindParam(':password', $password);

    $userStatement ->execute();

    redirectoRoute('/login');


} else {

    $error = " 

-necessite au moins 8 caractères! <br>
-au moins 1 caractère en Majuscule! <br>
-au moins 1 carctère en Miniscule! <br>
-au moins un nombre! <br>
-au moins 1 caractère spécial! <br>
";
}
}
}


require_once(__DIR__. '/../Views/security/register.view.php');
?>