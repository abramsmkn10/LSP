<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Cart;
use App\Checkout;
use Auth;
use Session;
use PDF;

class KasirController extends Controller
{
    public function dashboard() {
        return view('kasir.dashboard');
    }
    public function transaksi() {
        $produk = Produk::all();
        $cart = Cart::where('user_id', '1')->where('status','0')->get();
        return view('kasir.transaksi.index', compact('produk', 'cart'));
    }
    public function proses_transaksi(Request $r) {
        if(!Session::get('kode_unik')){
            Session::put('kode_unik', rand(1111111111,9999999999));
        }
        $harga = Produk::where('id', $r->produk_id)->first();
        $harga->stok -= $r->jumlah;
        $harga->save();
        $produk = new Cart;
        $produk->produk_id = $r->produk_id;
        $produk->jumlah = $r->jumlah;
        $produk->sub_total = $harga->harga_jual * $r->jumlah;
        $produk->user_id = '1';
        $produk->kode_unik = Session::get('kode_unik');
        $produk->save();
        return redirect()->back()->with('sukses', 'Barang Berhasil Ditambah!');
    }
    public function proses_hapus($id) {
        $transaksi = Cart::find($id);
        $transaksi->delete();
        return redirect()->back()->with('sukses', 'Barang Berhasil Dihapus!');
    }
    public function proses_hapus_all() {
        $transaksi = Cart::where('user_id', '1')->delete();
        return redirect()->back()->with('sukses', 'Barang Berhasil Dihapus!');
    }
    public function checkout() {
        $produk = Produk::all();
        $cart = Cart::where('user_id', '1')->where('status','0')->get();
        return view('kasir.transaksi.checkout', compact('produk', 'cart'));
    }
    public function proses_checkout(Request $r) {
        $cart = Cart::where('user_id', '1')->get();
      
        $cart2 = Cart::where('kode_unik', Session::get('kode_unik'))->update(array('status' => '1'));
        $checkout = new Checkout;
        $checkout->total = $cart->sum('sub_total');
        $checkout->user_id = '1';
        $checkout->metode = $r->metode;
        $checkout->saldo = $r->saldo;
        $checkout->kode_unik = Session::get('kode_unik');
        if($r->saldo < $cart->sum('sub_total')){
            return redirect(route('transaksi_checkout'));
        }
        $checkout->kembalian = $r->saldo - $cart->sum('sub_total');
        $checkout->save();
        Session::forget('kode_unik');
        return redirect(route('kode_unik'));
    }
    public function kode_unik() {
        $checkout = Checkout::all();
        return view('kasir.transaksi.kode_unik', compact('checkout'));
    }
    public function invoice(Request $r){
        $kode_unik = Cart::where('kode_unik', $r->kode_unik)->get();
        $pdf = PDF::loadview('kasir.transaksi.bukti', compact('kode_unik'));
        return $pdf->stream();
    }
}
