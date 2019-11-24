<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        $profil = Profil::all();
        return view('admin.master.informasitoko', compact('profil'));
    }

    public function save(Request $r){
        $profil = new Profil;
        $profil->nama_koperasi = $r->input('nama_koperasi');
        $profil->alamat_koperasi = $r->input('alamat_koperasi');
        $profil->keterangan = $r->input('keterangan');
        $profil->telepon = $r->input('telepon');
        $profil->kode_pos = $r->input('kode_pos');

        $foto = $r->file("foto");
        $nama_foto = $foto->getClientOriginalName();
        $r->file('foto')->move("images", $nama_foto);

        $profil->foto = $nama_foto;

        $profil->save();


        return redirect('profil/add');
    }



    public function update(Request $r ){
        $edit_gudang = Profil::find($r->input('id'));

        $edit_gudang->nama_koperasi = $r->input('nama_koperasi');
        $edit_gudang->telepon = $r->input('telepon');
        $edit_gudang->kode_pos = $r->input('kode_pos');
        $edit_gudang->keterangan = $r->input('keterangan');
        $edit_gudang->alamat_koperasi = $r->input('alamat_koperasi');
        $foto = $r->file("foto");
        $nama_foto = $foto->getClientOriginalName();
        $r->file('foto')->move("images", $nama_foto);

        $edit_gudang->foto = $nama_foto;
        $edit_gudang->save();

        return redirect('profil/add');
    }

    public function delete($id){
        $hapus = Profil::find($id);
        $path_foto = app_path("../public/images/{{$hapus->foto}}");
        Storage::delete($path_foto);    
        $hapus->delete();   
        return redirect('profil/add');
    }
}
