<?php

namespace App\Http\Controllers;

use App\Tower;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    // kalau status kunjungan towernya = belum dikunjungi . marker towernya merah
    // kalau status kunjungan towernya = sudah dikunjungi . marker towernya hijau

    public function getMaps(){
      $data = Tower::all();
      return $data;
    }

    public function getDetailMap($id){
      $data = Tower::findOrFail($id);
      return $data;
    }

}
