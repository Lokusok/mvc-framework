<?php

declare(strict_types=1);

namespace App\Core\Models;
class Post
{
    // оставил массив, логика с другими источниками будет похожей
    private static $data = [
        [
            'id' => 1,
            'title' => 'First post',
            'excerpt' => 'Short description',
            'content' => 'Big text about this post will be here'
        ],

        [
            'id' => 2,
            'title' => 'Second post',
            'excerpt' => 'Short description 2',
            'content' => 'Big text about this post will be here 2'
        ],

        [
            'id' => 3,
            'title' => 'Third post',
            'excerpt' => 'Short description 3',
            'content' => 'Big text about this post will be here 3'
        ],
        
        [
            'id' => 4,
            'title' => 'Third post',
            'excerpt' => 'Short description 4',
            'content' => 'Big text about this post will be here 4'
        ],

        [
            'id' => 5,
            'title' => 'Third post',
            'excerpt' => 'Short description 5',
            'content' => 'Big text about this post will be here 5'
        ],
    ];

    public static function all(): array
    {
        return self::$data;
    }

    public static function find(int $id): ?array
    {
        $post = null;

        foreach (self::$data as $dataPost) {
            if ($dataPost['id'] === $id) {
                $post = $dataPost;
            }
        }

        return $post;
    }

    public static function findOrFail(int $id): array
    {
        $post = self::find($id);

        if (! $post) {
            abort(404);
        }

        return $post;
    }
}