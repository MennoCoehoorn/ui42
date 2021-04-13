<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;


class LandingController extends Controller
{
    public function index(){
        $vils=City::select('vil_name');
        return view('/complete/landing',['vils'=> $vils]);
    }
}
