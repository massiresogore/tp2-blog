<?php



use App\AutoLoader;
use App\Controller\AuthController;
use App\Core\Application;
use App\Controller\BlogController;

require_once dirname(__DIR__) . '/autoload.php';



AutoLoader::register();
define('PUBLIC_PATH', dirname(__DIR__.'/public')); 

session_start();


$application = new Application();
$application->router->get('/', [BlogController::class, 'index']);
$application->router->get('/news/add', [BlogController::class, 'ajouterNews']);
$application->router->post('/news/add', [BlogController::class, 'createNews']);
$application->router->get('/news/view', [BlogController::class, 'newsList']);

// Edit
$application->router->get('/news/edit', [BlogController::class, 'editNews']);
$application->router->post('/news/edit', [BlogController::class, 'createEditNews']);

// Delete
$application->router->get('/news/delete', [BlogController::class, 'deleteNews']);

// Register
$application->router->get('/users/register', [AuthController::class, 'registerPage']);
$application->router->post('/users/register', [AuthController::class, 'register']);


// Login
$application->router->get('/users/login', [AuthController::class, 'loginPage']);
$application->router->post('/users/login', [AuthController::class, 'loginUser']);


$application->run();





