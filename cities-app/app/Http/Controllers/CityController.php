<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index(){
        $vils=City::select('vil_name');
        return view('/complete/landing',['vils'=> $vils]);
    }

    public function detail($id){
        $vil = City::where('id', $id)->get()->first();
        return view('/complete/detail',['vil'=> $vil]);
    }
}
