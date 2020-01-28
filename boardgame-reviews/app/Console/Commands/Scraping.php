<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;

class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapingを行なう';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        echo 'スクリプトを実行します。' . PHP_EOL;

        $crawler = Goutte::request('GET', 'https://bodoge.hoobby.net/spaces');
        $crawler->filter('#result-spaces > li')->each(function ($li) {
            echo 'タイトル：' . $li->filter('div > div.main > div.title > a')->text()."\n";
        });
#result-spaces > li:nth-child(1)
        #result-spaces > li:nth-child(1) > div > div.main > div.title > a
        // $title = $crawler->filter('#result-spaces > li:nth-child(1) > div > div.main > div.title > a')->text();

        // dump($title);
        #result-spaces > div.hide
        #result-spaces > li:nth-child(15) > div > div.main > div.title > a
        #result-spaces > li:nth-child(15) > div > div.main > div.title > div.address
        echo 'スクリプトを終了します。' . PHP_EOL;
    }
}
