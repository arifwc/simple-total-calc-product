<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use Auth;
    
class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tambah(){
        $uid = Auth::user()->id;
        $pesanan = new Pesanan();
        $pesanan->user_id = $uid;
        $pesanan->pesanan = request('menu');
        $pesanan->jumlah = request('jumlah');
        if($pesanan->jumlah < 1 || $pesanan->jumlah > 99){
            return redirect('menu')->with('error', 'Jumlah Pesanan salah atau terlalu sedikitterlalu banyak');
        }
        $pesanan->totalharga = request('harga')*$pesanan->jumlah;
        $pesanan->save();
            return redirect('menu')->with('success', 'Liat Keranjang');
    }

    public function liatKeranjang(){
        $uid = Auth::user()->id;
        $pesanan = Pesanan::where('user_id','=',$uid)->get();
        $total = 0;
        foreach ($pesanan as $harga) {
            $total += $harga->totalharga;
        }
        return view('keranjang',compact('pesanan','total'));
    }

}
