<?php

namespace App\Http\Controllers;

use App\MasterUnit;
use Illuminate\Http\Request;

class MasterUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $unit = MasterUnit::all();
        return view('admin.master.inventory.masterkonfig.unit', compact('unit'));
    }

    public function save(Request $r){
        $unit = new MasterUnit;
        $unit->unit = $r->input('unit');

        $unit->save();


        return redirect('admin/unit/add');
    }



    public function update(Request $r ){
        $unit = MasterUnit::find($r->input('id'));

        $unit->unit = $r->input('unit'); 
        $unit->save();

        return redirect('admin/unit/add');
    }

    public function delete($id){
        $hapus = MasterUnit::find($id);
        $hapus->delete();   
        return redirect('admin/unit/add');
    }
}
