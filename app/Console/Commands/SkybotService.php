<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Skybot;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SkybotService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:skybot-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch data from JSONPlaceholder
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();


        // Create 100 Skybots
        for ($k = 1; $k <= 100; $k++) {
            $skybot = Skybot::create([
                'name' => 'Skybot ' . $k,
            ]);

            // Create 10 Posts for each Skybot
            foreach (array_slice($posts, 0, 10) as $postData) {
                $post = Post::create([
                    'skybot_id' => $skybot->id,
                    'typicode_id' => $postData['id'],
                    'post_title' => $postData['title'],
                    'post_body' => $postData['body'],
                ]);

                // Create 10 Comments for each Post
                $postComments = array_filter($comments, fn($comment) => $comment['postId'] === $postData['id']);
                foreach (array_slice($postComments, 0, 10) as $commentData) {
                    Comment::create([
                        'post_id' => $post->id,
                        'typicode_id' => $commentData['id'],
                        'name' => $commentData['name'],
                        'comment' => $commentData['body'],
                    ]);
                }
            }
        }

        $this->info('Skybots, Posts, and Comments have successfully been created');
    }   

}
