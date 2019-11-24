<?php

namespace App\Http\Controllers;

use App\Masterppn;
use Illuminate\Http\Request;

class MasterppnController extends Controller
{
    public function stokppn() {
        $stokppn = Masterppn::all();
        return view('admin.master.inventory.masterkonfig.stokppn', compact('stokppn'));
    }

    public function tambah() {
        return view('admin.master.inventory.tambah');
    }

    public function proses_tambah(Request $r) {
        $stokppn = new Masterppn;
        $stokppn->stok_minimum = $r->stok_minimum;
        $stokppn->ppn = $r->ppn;
        $stokppn->save();
        return redirect(route('stokppn'))->with('sukses', 'Data Berhasil Ditambah!');
    }

    public function hapus($id) {
        $stokppn = Masterppn::find($id);
        $stokppn->delete();
        return redirect(route('stokppn'))->with('sukses', 'Data Berhasil Dihapus!');
    }
}
