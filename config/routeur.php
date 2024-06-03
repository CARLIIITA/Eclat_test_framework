<?php 

require_once(__DIR__ . "/db.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [

'/' => '/HomeController.php',

'/login' => '/LoginController.php',
'/logout' => '/LogoutController.php',
'/register' => '/RegisterController.php',

'/admin' => '/AdminController.php',
'/admin-delete' => '/AdminDeleteController.php',
'/update-admin' => '/UpdateAdminController.php',
'/mention-legale' => '/MentionController.php',

'/perfume' => '/PerfumeController.php',
'/perfume-create' => '/PerfumeCreateController.php',
'/perfume-read' => '/PerfumeReadController.php',
'/perfume-delete' => '/PerfumeDeleteController.php',
'/update-perfume' => '/UpdatePerfumeController.php',

];

$securedRoutes = [

'/admin' => '/AdminController.php',
'/admin-delete' => '/AdminDeleteController.php',
'/update-admin' => '/UpdateAdminController.php',


];

if (array_key_exists($uri, $routes)) {
    require_once(__DIR__ . '/../app/Controllers/' . $routes[$uri]);
} else {
    http_response_code(404);
    require_once(__DIR__ . '/../app/Controllers/404.php');
}