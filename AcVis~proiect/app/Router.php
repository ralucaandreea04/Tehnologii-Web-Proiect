<?php

$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

$routes = [
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/' => __DIR__. '/../controller/paginaPrincipalaController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/actor' => __DIR__. '/../controller/actorController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/all' => __DIR__. '/../controller/allActorsController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/winners' =>__DIR__. '/../controller/winnersController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/login' =>__DIR__. '/../controller/loginController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/adminpage' =>__DIR__. '/../controller/adminpageController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/logout' =>__DIR__. '/../controller/logoutController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/about' =>__DIR__. '/../controller/aboutController.php',
    '/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/search' =>__DIR__. '/../controller/searchController.php',
];
if (array_key_exists($path, $routes)) {
    require_once $routes[$path];
} else {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'paginaPrincipala';
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

$controller_function = "{$controller}_{$action}";
if (function_exists($controller_function)) {
    $controller_function();
} 
?>
