<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index(){
        $vils=City::select('vil_name')->get();
        return view('/complete/landing',['vils'=> json_encode($vils, JSON_UNESCAPED_SLASHES )]);
    }

    public function detail($id){
        $vil = City::where('id', $id)->get()->first();
        return view('/complete/detail',['vil'=> $vil]);
    }

    public function search(Request $req){
        $vil_name = $req->vil;
        $id = City::where('vil_name', 'LIKE', "%{$vil_name}%")->get('id')->first();
        return redirect()->route('detail', ['id'=>$id]);
    }
}
