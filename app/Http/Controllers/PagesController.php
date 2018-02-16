<?php

namespace App\Http\Controllers;

use App\Tower;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('dismap/maps');
    }
    public function towerIndex(){
        $data['tower'] = Tower::all();
        $data['number'] = 1;
 
        return view ('dismap/data-tower', $data);
    }
}
