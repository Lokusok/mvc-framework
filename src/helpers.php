<?php

declare(strict_types=1);

use App\Core\Http\Exceptions\HttpException;

function view(string $path, array $data = []): string
{
    if (! str_ends_with($path, '.php')) {
        $path .= '.php';
    }

    $mainPath = explode('.php', $path)[0];

    // точки переделываем в слеши
    if (str_contains($mainPath, '.')) {
        $path = str_replace('.', '/', $mainPath) . '.php';
    }

    // делаем переменные, которые будут доступны в шаблоне
    if (! empty($data)) {
        foreach ($data as $var => $value) {
            $$var = $value;
        }
    }

    $fullPath = VIEWS_DIR . '/' . $path;
    
    ob_start();
    include_once $fullPath;
    $content = ob_get_clean();

    return $content;
}

function abort(int $status)
{
    throw new HttpException(
        code: $status
    );
}
