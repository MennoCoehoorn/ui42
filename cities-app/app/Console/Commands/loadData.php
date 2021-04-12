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
    var $image_path;
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
    private $url_glob;
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
        $this->url_glob = $url;
        $page = $client->request('GET',$url);
        $body = $page->filter('#telo');
        $body->filter('table')->filter('tr')->each(function ($tr, $url){
            $string_arry = explode(" ",$tr->text());

            if(in_array("Obec",$string_arry)){
                $v_name = "";
                for($i = array_search("Obec",$string_arry)+1;$i<array_search("Uprav",$string_arry);$i++){
                    $v_name = $v_name.$string_arry[$i];
                    $v_name = $v_name." ";
                }
                $this->vil_infos[$this->index]->vil_name = $v_name;
            }

            if(in_array("Mesto",$string_arry)){
                $v_name = "";
                for($i = array_search("Mesto",$string_arry)+1;$i<array_search("Uprav",$string_arry);$i++){
                    $v_name = $v_name.$string_arry[$i];
                    $v_name = $v_name." ";
                }
                $this->vil_infos[$this->index]->vil_name = $v_name;
            }

            if(in_array("Primátor:",$string_arry)){
                $name = "";
                for($i = array_search("Primátor:",$string_arry)+1;$i<count($string_arry);$i++){
                    $name = $name.$string_arry[$i];
                    $name = $name." ";
                }
                $this->vil_infos[$this->index]->mayor_name = $name;
            }

            if(in_array("Starosta:",$string_arry)){
                $name = "";
                for($i = array_search("Starosta:",$string_arry)+1;$i<count($string_arry);$i++){
                    $name = $name.$string_arry[$i];
                    $name = $name." ";
                }
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
            
            $img_path = "/img";
            $img_path = $img_path."/";
            $url_array = explode("/",$this->url_glob);
            $img_path = $img_path.$url_array[array_search("obec",$url_array)+1];
            $img_path = $img_path.".png";
            $this->vil_infos[$this->index]->image_path = $img_path;

        });
    }
    public function handle()
    {
        $this->counties();
        foreach ($this->county_webs as $c_web){
            $this->cities($c_web);
        }
        foreach($this->village_webs as $v_web){
            $vil_inf = new VilInfo;
            array_push($this->vil_infos,$vil_inf);
            $this->vil_info($v_web);
            $this->info($this->vil_infos[$this->index]->vil_name);
            $this->index = $this->index +1;
        }
    }
}
