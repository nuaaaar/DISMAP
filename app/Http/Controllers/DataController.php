<?php

namespace App\Http\Controllers;

use App\Tower;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function towerStore(Request $request)
    {
        $data = $request->all();

        Tower::create([
            'pengelola' => $data['add_pengelola'],
            'site' => $data['add_siteid']. ' / ' .$data['add_sitename'],
            'jenis_menara' => $data['add_jenismenara'],
            'lokasi_menara' => $data['add_lokasimenara'],
            'luas_lokasi' => $data['add_luaslokasi'],
            'status_lokasi' => $data['add_statuslokasi'],
            'lat' => $data['add_latitude'],
            'lng' => $data['add_longitude'],
            'tinggi_menara' => $data['add_tinggimenara'],
            'status_kunjungan' => $data['add_statuskunjungan'],
            'keterangan' => $data['add_keterangan']
        ]);
        session()->flash('status', 'Sukses menambah data !');

        return redirect()->back();
    }
}
