<?php
session_start();


use App\AutoLoader;
use App\Core\Application;
use App\Controller\BlogController;

require_once dirname(__DIR__) . '/autoload.php';



AutoLoader::register();
define('PUBLIC_PATH', dirname(__DIR__.'/public')); 

$application = new Application();
$application->router->get('/', [BlogController::class, 'index']);
$application->router->get('/news/add', [BlogController::class, 'ajouterNews']);
$application->router->post('/news/add', [BlogController::class, 'createNews']);

$application->run();

