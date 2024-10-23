<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SyncArticleViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-article-view-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'syncing articles views count from Redis to Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::where('status', Article::STATUS_PUBLISHED)
            ->orderBy('views_count', 'asc')
            ->pluck('id')
            ->map(function ($id) {
                return ['id' => $id, 'views_count' => Redis::pfcount(sprintf('article:%u:views', $id))];
            })
            ->toArray();


        batch()->update(new Article(), $articles, 'id');
        return true;
    }
}
