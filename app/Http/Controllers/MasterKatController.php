<?php

namespace App\Http\Controllers;

use App\MasterKat;
use Illuminate\Http\Request;

class MasterKatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        $masterkat = MasterKat::all();
        return view('admin.master.inventory.masterkonfig.kategori', compact('masterkat'));
    }

    public function save(Request $r){
        $masterkat = new MasterKat;
        $masterkat->kategori = $r->input('kategori');

        $masterkat->save();


        return redirect('admin/kategori/add');
    }



    public function update(Request $r ){
        $masterkat = MasterKat::find($r->input('id'));

        $masterkat->kategori = $r->input('kategori'); 
        $masterkat->save();

        return redirect('admin/kategori/add');
    }

    public function delete($id){
        $hapus = MasterKat::find($id);
        $hapus->delete();   
        return redirect('admin/kategori/add');
    }
}
