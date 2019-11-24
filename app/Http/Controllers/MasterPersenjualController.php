<?php

namespace App\Http\Controllers;

use App\MasterPersenjual;
use Illuminate\Http\Request;

class MasterPersenjualController extends Controller
{
     public function laba() {
        $laba = MasterPersenjual::all();
        return view('admin.master.inventory.masterkonfig.persentaselaba', compact('laba'));
    }

    public function tambah() {
        return view('admin.master.inventory.masterkonfig.persentaselaba');
    }

    public function proses_tambah(Request $r) {
        $laba = new MasterPersenjual;
        $laba->laba = $r->laba;
        $laba->save();
        return redirect(route('laba'))->with('sukses', 'Data Berhasil Ditambah!');
    }

    public function hapus($id) {
        $laba = MasterPersenjual::find($id);
        $laba->delete();
        return redirect(route('laba'))->with('sukses', 'Data Berhasil Dihapus!');
    }
}
