<?php

namespace App\Http\Controllers;

use App\ProdukOut;
use Illuminate\Http\Request;

class ProdukOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $produkout = ProdukOut::all();
        return view('admin.master.inventory.laporanbarangkeluar', compact('produkout'));
    }
    public function all(){
        $pk = ProdukOut::all();
        return view('superadmin.master.keluar', compact('pk'));
    }


     public function save(Request $r){
        $produkin2 = new ProdukOut;
        $produkin2->nama = $r->input('nama');
        $produkin2->barcode = $r->input('barcode');
        $produkin2->jumlah = $r->input('jumlah');
        $produkin2->telpon = $r->input('telpon');
        $produkin2->kode_pos = $r->input('kode_pos');
        $produkin2->type_keluar = $r->input('type_keluar');
        $produkin2->deskripsi = $r->input('deskripsi');

        $produkin2->save();

        return redirect('superadmin/keluar/all');
    }



    public function update(Request $r ){
        $produkin2 = ProdukOut::find($r->input('id'));

        $produkin2->nama = $r->input('nama');
        $produkin2->barcode = $r->input('barcode');
        $produkin2->jumlah = $r->input('jumlah');
        $produkin2->telpon = $r->input('telpon');
        $produkin2->kode_pos = $r->input('kode_pos');
        $produkin2->type_keluar = $r->input('type_keluar');
        $produkin2->deskripsi = $r->input('deskripsi');
        $produkin2->save();

        return redirect('superadmin/keluar/all');
    }

    public function delete($id){
        $hapus = ProdukOut::find($id);
        $hapus->delete();   
        return redirect('superadmin/keluar/all');
    }
}
