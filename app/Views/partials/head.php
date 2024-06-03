<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 
        <?php if(isset($title)) {
            echo $title;
        }?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css" integrity="sha384-QDSPDoVOoSWz2ypaRUidLmLYl4RyoBWI44iA5agn6jHegBxZkNqgm2eHb6yZ5bYs" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/Css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link" href= "/" >Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mention-legale" >Mention Légale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/article" >Liste de parfums</a>
                </li>
                <?php if (!isset($_SESSION['user'])) { ?>
                    <a class="navbar-brand mt-2 mt-lg-0" href="/">
                    <img src="/public/img/parfumLogo.png" height="180" alt="">
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" >Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register" >S'inscrire</a>
                    </li>
                    <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" >Se Deconnecter</a>
                    </li>
                    <?php if ($_SESSION['user']['admin'] == true) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin" >Profil</a>
                        </li>
                <?php }
                } ?>
            </ul>
        </div>
    </nav>