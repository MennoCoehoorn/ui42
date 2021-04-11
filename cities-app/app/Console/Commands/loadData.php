<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class loadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data concerning Nitran cities';

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
     * @return int
     */
    private $county_webs = array();
    private $links = array();
    public function handle()
    {
        $client = new Client();
        $url = 'https://www.e-obce.sk/kraj/NR.html';

        $page = $client->request('GET',$url);
        $body = $page->filter('#telo');
        $body->filter('table')->filter('tr > td > a')->each(function ($a, $links){
            array_push($this->links, $a->attr('href'));
        });
        foreach ($this->links as $link){
            if(strpos($link, "/okres")!=false){
                array_push($this->county_webs, $link);
            }
        }
        foreach ($this->county_webs as $c_web){
            $this->info($c_web);
        }
    }
}
