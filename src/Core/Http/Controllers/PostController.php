<?php

declare(strict_types=1);

namespace App\Core\Http\Controllers;

use App\Core\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Маршрут для теста двух параметров
     */
    public function withSlug(int $id, string $slug)
    {
        echo '<pre>';
        var_dump($id, $slug);
        exit();
    }
}