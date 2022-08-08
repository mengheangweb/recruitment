<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class PostTrash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:trash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It is for completely delete post from database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = now()->subMonth(1)->format('Y-m-d');
        $trash = Post::onlyTrashed()->where('deleted_at', '<', $date)->forceDelete();

        $this->info('The command was successful!');
        return 0;
    }
}
