<?php

namespace App\Http\Controllers;

use App\Produkin;
use Illuminate\Http\Request;

class ProdukinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $produkin = Produkin::all();
        return view('superadmin.master.masuk', compact('produkin'));
    }

    public function all(){
        $produkin2 = Produkin::all();
        return view('admin.master.inventory.laporanbarangmasuk', compact('produkin2'));
    }


     public function save(Request $r){
        $produkin2 = new Produkin;
        $produkin2->nama = $r->input('nama');
        $produkin2->barcode = $r->input('barcode');
        $produkin2->jumlah = $r->input('jumlah');
        $produkin2->telpon = $r->input('telpon');
        $produkin2->kode_pos = $r->input('kode_pos');
        $produkin2->type_masuk = $r->input('type_masuk');
        $produkin2->deskripsi = $r->input('deskripsi');

        $produkin2->save();

        return redirect('superadmin/masuk/add');
    }



    public function update(Request $r ){
        $produkin2 = Produkin::find($r->input('id'));

        $produkin2->nama = $r->input('nama');
        $produkin2->barcode = $r->input('barcode');
        $produkin2->jumlah = $r->input('jumlah');
        $produkin2->telpon = $r->input('telpon');
        $produkin2->kode_pos = $r->input('kode_pos');
        $produkin2->type_masuk = $r->input('type_masuk');
        $produkin2->deskripsi = $r->input('deskripsi');

        $produkin2->save();

        return redirect('superadmin/masuk/add');
    }

    public function delete($id){
        $hapus = Produkin::find($id);
        $hapus->delete();   
        return redirect('superadmin/masuk/add');
    }
}
