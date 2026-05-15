<?php

declare(strict_types=1);

const VIEWS_DIR = __DIR__ . '/../src/views';

spl_autoload_register(function ($class) {
    $classPath = implode('/', array_slice(explode('\\', $class), 1)) . '.php';
    $fullPath = dirname(__DIR__) . '/src/' . $classPath;

    if (file_exists($fullPath)) {
        require $fullPath;
    }
});

require dirname(__DIR__) . '/src/helpers.php';
require dirname(__DIR__) . '/src/app.php';
