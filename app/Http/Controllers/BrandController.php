<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class BrandController extends Controller
{
   public function add(){
        $profil = Brand::all();
        return view('superadmin.master.brand.Brand', compact('profil'));
    }

    public function save(Request $r){
        $profil = new Brand;
        $profil->nama = $r->input('nama');
        $profil->alamat = $r->input('alamat');
        $profil->keterangan = $r->input('keterangan');
        $profil->telepon = $r->input('telepon');
        $profil->kode_pos = $r->input('kode_pos');

        $foto = $r->file("foto");
        $nama_foto = $foto->getClientOriginalName();
        $r->file('foto')->move("images", $nama_foto);

        $profil->foto = $nama_foto;

        $profil->save();


        return redirect('superadmin/brand/add');
    }



    public function update(Request $r ){
        $edit_gudang = Brand::find($r->input('id'));

        $profil->nama = $r->input('nama');
        $profil->alamat = $r->input('alamat');
        $profil->keterangan = $r->input('keterangan');
        $profil->telepon = $r->input('telepon');
        $profil->kode_pos = $r->input('kode_pos');
        $foto = $r->file("foto");
        $nama_foto = $foto->getClientOriginalName();
        $r->file('foto')->move("images", $nama_foto);

        $edit_gudang->foto = $nama_foto;
        $edit_gudang->save();

         return redirect('superadmin/brand/add');
    }

    public function delete($id){
        $hapus = Brand::find($id);
        $path_foto = app_path("../public/images/{{$hapus->foto}}");
        Storage::delete($path_foto);    
        $hapus->delete();   
         return redirect('superadmin/brand/add');
    }
}
