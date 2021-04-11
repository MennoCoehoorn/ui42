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
    private $village_webs = array();
    public function counties(){
        $client = new Client();
        $url = 'https://www.e-obce.sk/kraj/NR.html';

        $page = $client->request('GET',$url);
        $body = $page->filter('#telo');
        $body->filter('table')->filter('tr > td > a')->each(function ($a){
            if(strpos($a->attr('href'), "/okres")!=false){
                array_push($this->county_webs, $a->attr('href'));
            }
        });
    }
    public function cities($url){
        $client = new Client();
        
        $page = $client->request('GET',$url);
        $body = $page->filter('#telo');
        $body->filter('table')->filter('tr > td > a')->each(function ($a){
            if(strpos($a->attr('href'), "/obec")!=false){
                array_push($this->village_webs, $a->attr('href'));
            }
        });
    }
    public function handle()
    {
        $this->counties();
        foreach ($this->county_webs as $c_web){
            $this->cities($c_web);
        }
        foreach($this->village_webs as $v_web){
            $this->info($v_web);
        }
        
    }
}
