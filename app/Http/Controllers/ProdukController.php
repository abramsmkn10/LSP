<?php

namespace App\Http\Controllers;

use App\Produk;
use App\MasterKat;
use App\MasterPersenjual;
use App\MasterUnit;
use App\MasterCurr;
use App\Masterppn;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function produk() {
        $kategori = MasterKat::all();
        $produk = Produk::all();
        $matauang = MasterCurr::all();
        $unit = MasterUnit::all();
        $laba = MasterPersenjual::all();
        $stok_minimum = Masterppn::all();
        return view('admin.master.inventory.masterproduk', compact('kategori', 'matauang', 'unit', 'laba', 'stok_minimum','produk'));
    }

    public function tambah() {
        $kategori = MasterKat::all();
        $matauang = MasterCurr::all();
        $unit = MasterUnit::all();
        $laba = MasterPersenjual::all();
        $stok_minimum = Masterppn::all();
        return view('admin.master.inventory.masterproduk', compact('kategori', 'matauang', 'unit', 'laba', 'stok_minimum'));
    }

    public function proses_tambah(Request $r) {
        $produk = new Produk;
        $barcode = rand(1111,999999);
        $produk->barcode = $barcode;
        $produk->nama = $r->nama;
        $produk->stok = $r->stok;
        $produk->kategori_id = $r->kategori_id;
        $produk->mata_uang_id = $r->mata_uang_id;
        $produk->unit_id = $r->unit_id;
        $produk->harga_beli = $r->harga_beli;
        $produk->keterangan = $r->keterangan;
        $produk->diskon = $r->diskon;
        $produk->laba = $r->laba;
        $produk->ppn = $r->stok_minimum;

        if($r->diskon != null){
            $diskon = $r->harga_beli * $r->diskon / '100';
            $minus = $r->harga_beli - $diskon;
            $persen = $minus * ($r->laba + $r->ppn) / '100';
            $produk->harga_jual = $persen + $minus;
        }else{
        $persen = $r->harga_beli * ($r->laba + $r->ppn) / '100';
        $produk->harga_jual = $r->harga_beli + $persen;
        }
        $produk->save();
        return redirect(route('produk'))->with('sukses', 'Data Berhasil Ditambah!');
    }

    public function hapus($id) {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect(route('produk'))->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function detail($barcode) {
        $kategori = MasterKat::all();
        $matauang = MasterCurr::all();
        $unit = MasterUnit::all();
        $laba = MasterPersenjual::all();
        $stok_minimum = Masterppn::all();
        $produk = Produk::where('barcode', $barcode)->first();
        return view('admin.inventory.produk.detail', compact('produk', 'kategori', 'matauang', 'unit', 'laba', 'stok_minimum'));
    }

    public function proses_detail(Request $r) {
        $produk = Produk::where('barcode', $r->barcode)->first();
        $produk->nama = $r->nama;
        $produk->stok = $r->stok;
        $produk->kategori_id = $r->kategori_id;
        $produk->mata_uang_id = $r->mata_uang_id;
        $produk->unit_id = $r->unit_id;
        $produk->harga_beli = $r->harga_beli;
        $produk->keterangan = $r->keterangan;
        $produk->diskon = $r->diskon;
        $produk->laba = $r->laba;
        $produk->ppn = $r->stok_minimum;

        if($r->diskon != null){
            $diskon = $r->harga_beli * $r->diskon / '100';
            $persen = $diskon * ($r->laba + $r->stok_minimum) / '100';
            $produk->harga_jual = $diskon + $persen;
        }else{
        $persen = $r->harga_beli * ($r->laba + $r->stok_minimum) / '100';
        $produk->harga_jual = $r->harga_beli + $persen;
        }
        $produk->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Diubah!');
    }
}
