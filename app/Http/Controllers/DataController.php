<?php

namespace App\Http\Controllers;

use App\Tower;
use Illuminate\Http\Request;

class DataController extends Controller
{   
    public function towerView($id){
        $data = Tower::where('id', $id)->first();

        return $data;
    }

    public function towerStore(Request $request){
        $data = $request->all();
        $latitude = str_replace(',', '.', $data['add_latitude']);
        $longitude = str_replace(',' , '.', $data['add_longitude']);

        if($data['add_keterangan'] == null){
            $data['add_keterangan'] = '-';
        };
        if($data['add_luaslokasi'] == null){
            $data['add_luaslokasi'] = '-';
        };

        Tower::create([
            'pengelola' => $data['add_pengelola'],
            'noreg' => $data['add_noreg'],
            'site' => $data['add_siteid']. ' / ' .$data['add_sitename'],
            'jenis_menara' => $data['add_jenismenara'],
            'lokasi_menara' => $data['add_lokasimenara'],
            'luas_lokasi' => $data['add_luaslokasi'],
            'status_lokasi' => $data['add_statuslokasi'],
            'lat' => $latitude,
            'lng' => $longitude,
            'tinggi_menara' => $data['add_tinggimenara'],
            'status_kunjungan' => $data['add_statuskunjungan'],
            'keterangan' => $data['add_keterangan']
        ]);
        session()->flash('status', 'Berhasil menambah data !');

        return redirect()->back();
    }

    public function towerEdit(Request $request, $id){
        $data = Tower::where('id', $id)->first();

        return $data;
    }

    public function towerUpdate(Request $request, $id){
        $data = $request->all();

        Tower::where('id', $id)->update([
            'pengelola' => $data['edit_pengelola'],
            'noreg' => $data['edit_noreg'],
            'site' => $data['edit_siteid']. ' / ' .$data['edit_sitename'],
            'jenis_menara' => $data['edit_jenismenara'],
            'lokasi_menara' => $data['edit_lokasimenara'],
            'luas_lokasi' => $data['edit_luaslokasi'],
            'status_lokasi' => $data['edit_statuslokasi'],
            'lat' => $data['edit_latitude'],
            'lng' => $data['edit_longitude'],
            'tinggi_menara' => $data['edit_tinggimenara'],
            'status_kunjungan' => $data['edit_statuskunjungan'],
            'keterangan' => $data['edit_keterangan']
        ]);
        session()->flash('status', 'Berhasil mengupdate data !');

        return redirect()->back();
    }
    public function towerDestroy($id){
        Tower::where('id', $id)->delete();
        session()->flash('destroyed', 'Berhasil menghapus data !');

        return redirect()->back();
    }
}
