<?php

namespace App\Http\Controllers;

use App\MasterCurr;
use Illuminate\Http\Request;

class MasterCurrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function add(){
        $curr = MasterCurr::all();
        return view('admin.master.inventory.masterkonfig.curr', compact('curr'));

    }
    public function save(Request $r){
        $curr = new MasterCurr;
        $curr->matauang = $r->input('matauang');

        $curr->save();


        return redirect('admin/curr/add');
    }
    public function update(Request $r ){
        $curr = MasterCurr::find($r->input('id'));

        $curr->matauang = $r->input('matauang'); 
        $curr->save();

        return redirect('admin/curr/add');
    }

    public function delete($id){
        $hapus = MasterCurr::find($id);
        $hapus->delete();   
        return redirect('admin/curr/add');
    }
}
