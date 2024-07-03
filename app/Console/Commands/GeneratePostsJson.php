<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GeneratePostsJson extends Command
{
    protected $signature = 'posts:generate-json';

    protected $description = 'Generate posts.json file';

    public function handle()
    {
        $posts = [
            ['id' => 1, 'title' => 'First Post', 'content' => 'Content of first post'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'Content of second post'],
            // Add more posts as needed
        ];

        $json = json_encode($posts);

        Storage::disk('local')->put('posts.json', $json);

        $this->info('posts.json file generated successfully.');
    }
}
