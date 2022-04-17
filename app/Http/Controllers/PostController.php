<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;

/**
 *
 */
class PostController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $post = Post::find(1);
        dump($post);
        echo "</br>";
        echo "</br>";
        dump('All');
        $posts = Post::all();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
            echo '</br>';
        endforeach;
        echo '</br>';
        echo "</br>";
        // $posts = Post::where('is_published', 1)->first();
        // $posts = Post::where('is_published', 0)->first();
        dump('Is published');
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
            echo "</br>";
        endforeach;
        echo "</br>";

        dump('No published, no likes');
        $posts = Post::where('is_published', 0)
            ->where('likes', 0)->get();
        foreach ($posts as $post):
            dump($post->title);
            dump($post->content);
            dump($post->image);
            dump($post->likes);
            dump($post->is_published);
        endforeach;
        echo "</br>";

        dd('end');
        // echo "</br>";
        // return 'Create post';
    }

    public function create(): void
    {
        $arrPosts = [
            [
                'title'        => 'Добавленный Пост 1',
                'content'      => 'Содержание добавленного Поста 1',
                'image'        => 'add_image_1',
                'likes'        => 10,
                'is_published' => 1
            ],
            [
                'title'        => 'Добавленный Пост 2',
                'content'      => 'Содержание добавленного Поста 2',
                'image'        => 'add_image_2',
                'likes'        => 10,
                'is_published' => 1
            ]
        ];
        foreach ($arrPosts as $post):
            dump($post);
            Post::create($post);
            // Post::create([
            //     'title' => $post['title'],
            //     'content' => $post['content'],
            //     'image' => $post['image'],
            //     'likes' => $post['likes'],
            //     'is_published' => $post['is_published'],
            // ]);
        endforeach;
        dd('created');
    }

}