<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class VilInfo{
    var $vil_name;
    var $mayor_name;
    var $address;
    var $phone;
    var $fax;
    var $email;
    var $web;
}

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
    private $vil_infos = array();
    private $index = 0;
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
    public function vil_info($url){
        $client = new Client();
        
        $page = $client->request('GET',$url);
        $body = $page->filter('#telo');
        $body->filter('table')->filter('tr')->each(function ($tr){
            $string_arry = explode(" ",$tr->text());

            if((in_array("Obec",$string_arry))or(in_array("Mesto",$string_arry))){
                $this->vil_infos[$this->index]->vil_name = $string_arry[1];
            }

            if((in_array("Primátor:",$string_arry))or(in_array("Starosta:",$string_arry))){
                $name = "{$string_arry[1]} {$string_arry[2]}";
                $this->vil_infos[$this->index]->mayor_name = $name;
            }

            if(in_array("Email:",$string_arry)){
                $emails = "";
                for($i = array_search("Email:",$string_arry)+1;$i<count($string_arry);$i++){
                    $emails = $emails.$string_arry[$i];
                    $emails = $emails.", ";
                }
                $this->vil_infos[$this->index]->email = $emails;

                $address = "";
                for($i = 0;$i<array_search("Email:",$string_arry);$i++){
                    $address = $address.$string_arry[$i];
                    $address = $address." ";
                }
                $this->vil_infos[$this->index]->address = $address;
            }

            
            if(in_array("Tel:",$string_arry)){
                $tel = "";
                for($i = array_search("Tel:",$string_arry)+1;$i<count($string_arry);$i++){
                    $tel = $tel.$string_arry[$i];
                }
                $this->vil_infos[$this->index]->phone = $tel;
            }

            if(in_array("Fax:",$string_arry)){
                $fax = "";
                for($i = array_search("Fax:",$string_arry)+1;$i<count($string_arry);$i++){
                    $fax = $fax.$string_arry[$i];
                }
                $this->vil_infos[$this->index]->fax = $fax;
            }
            
            if(in_array("Web:",$string_arry)){
                $web = "";
                $address2 = "";
                for($i = array_search("Web:",$string_arry)+1;$i<count($string_arry);$i++){
                    $web = $web.$string_arry[$i];
                }
                for($i = 0;$i<array_search("Web:",$string_arry);$i++){
                    $address2 = $address2.$string_arry[$i];
                    $address2 = $address2." ";
                }
                $this->vil_infos[$this->index]->web = $web;
                $this->vil_infos[$this->index]->address = $this->vil_infos[$this->index]->address.$address2;
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
        }
        $vil_inf = new VilInfo;
        array_push($this->vil_infos,$vil_inf);
        $this->vil_info('https://www.e-obce.sk/obec/kolarovo/kolarovo.html');
        $this->info($this->vil_infos[0]->vil_name);
        $this->info($this->vil_infos[0]->mayor_name);
        $this->info($this->vil_infos[0]->address);
        $this->info($this->vil_infos[0]->phone);
        $this->info($this->vil_infos[0]->fax);
        $this->info($this->vil_infos[0]->email);
        $this->info($this->vil_infos[0]->web);
    }
}
