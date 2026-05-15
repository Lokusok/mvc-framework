<?php

declare(strict_types=1);

namespace App;

use App\Core\Http\Exceptions\HttpException;
use App\Core\Http\Controllers\HomeController;
use App\Core\Http\Controllers\PostController;
use App\Core\Http\Router;
use Exception;

$router = new Router();

try {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/posts', [PostController::class, 'index']);
    $router->get('/posts/{id}', [PostController::class, 'show']);

    // В документе описывается {var}/{var} - я так понял, это про два и более параметра
    $router->get('/posts/{id}/{slug}', [PostController::class, 'withSlug']);

    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'];
    
    $router->resolve(
        path: $path,
        method: $method
    );
} catch (HttpException|Exception $e) {
    echo view('errors.' . $e->getCode());
}
