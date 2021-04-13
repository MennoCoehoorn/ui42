<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\City;

class geocoding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates latitude and longitude for cities in DB';

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
    public function handle()
    {
        $city_address = City::select('address')->where('id',1)->get();
        $this->info($city_address[0]['address']);

    }
}
