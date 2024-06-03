<?php 


if (isset($_SESSION['user'])) {
    redirectoRoute('/');
}

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) ) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "E-mail invalide";
        require_once(__DIR__ . '/../Views/security/login.view.php');
        exit;
    }

    $userQuery = "SELECT * FROM user WHERE email = :email";
    $userStatement = $mysqlClient->prepare($userQuery);
    $userStatement->bindParam(':email', $email);
    $userStatement->execute();

    $user = $userStatement->fetch();

    if ($user) {

        if ($password == $user['password']) {
            $_SESSION['user'] = [
                'id' => uniqid(),
                'email' => $user['email'],
                'role' => $user['admin'],
            ];
            redirectoRoute('/');
        } else {
            $error = "E-mail ou mot de passe incorrect";
            require_once(__DIR__ . '/../Views/security/login.view.php');
            exit;
        }
    } else {
        $error = "E-mail ou mot de passe incorrect";
    }
}

require_once(__DIR__ . '/../Views/security/login.view.php');