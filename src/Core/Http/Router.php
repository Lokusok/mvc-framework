<?php

declare(strict_types=1);

namespace App\Core\Http;

class Router
{
    private array $mappings = [];

    public function get(string $pattern, callable|array $handler)
    {
        $this->mappings['GET'][$pattern] = $handler;
    }

    // post, put, patch, delete - по тому же принципу

    public function resolve(string $path, string $method)
    {
        $method = mb_strtoupper($method);
        $path = mb_strtolower($path);

        $is404 = true;

        // совпадения по паттернам
        foreach ($this->mappings[$method] as $pattern => $route) {
            $regex = '#^' . preg_replace('#\{[^}]+\}#', '([^/]+)', $pattern) . '$#';
            
            $isMatch = preg_match($regex, $path, $matches);

            if ($isMatch) {
                $is404 = false;

                if (is_array($route)) {
                    $route = [new $route[0], $route[1]];
                }

                $arguments = [];

                if (count($matches) > 1) {
                    $arguments = array_slice($matches, 1);
                }

                $response = call_user_func_array($route, $arguments);

                // тут можем проверять, строка - отдаём как html, массив - как json
                if (is_string($response)) {
                    echo $response;
                }
            }
        }

        // обработка не нахождения маршрута
        if ($is404) {
            abort(404);
        }
    }
}