<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Antrean;
use App\Counter;
use App\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukCounterController extends Controller
{
    public function dspcounterboard()
    {
        // $tgl = Antrean::select('tanggal')->groupBy('tanggal')->get(); // get return collection 
        $tgl = Carbon::now('+7:00')->format('Y-m-d');
        $lyn = Layanan::all();  
        $ktr = Kantor::all();
        $ctr = Counter::whereNull('operator')->get();
        return view ('operator.dashboard.counterloginform', [
            'Tggl'=>$tgl, 
            'Kntr'=> $ktr, 
            'Lyan'=>$lyn,
            'Cntr'=>$ctr, 
            'title' => 'Halaman Masuk'
        ]);
    }

    public function cekloginoprcounter(Request $request)
    {
        $request->validate([
            // 'tgl' => 'required',
            'ctr' => 'required',
        ]);

        // untuk cek apa aja yg dibawa oleh $request use --> dd($request);
        $tan = Carbon::now('+7:00')->format('Y-m-d');
        $ctr_klik = Counter::where('id', '=', $request->ctr)->first(); // first return row  
        $lok = $ctr_klik->id_kantor;  // lokasi counter
        $lay = $ctr_klik->id_layanan;  // layann counter
        $cid = $ctr_klik->id;        // id counter
        $noc = $ctr_klik->nocount;  // nomor counter
        // disini tanggal dan operator counter masih 
        // kosong akan di isi saat redirect ke board

        $user = Auth::user();
        if($user) {
                $request->session()->put('loginId', $user->id);// ctt user_id pd session
                // catat dulu pd table fisiknya counter..  
                // tanggal & nama operator yg masuk..
                // baru route ke board operator..
                $ctr_klik->tanggal = $tan;  // ambil tanggal dari $request->tgl
                $ctr_klik->operator = $user->id; // ambil tanggal dari $request
                $ctr_klik->save();
                return redirect("/operator/pengunjung/filter/$tan/$lok/$lay/$user->nama/$cid");
        } else return back()->with('fail', 'nama ini tidak terdaftar!'); 
    }
    
    // public function logout($idctr, $idopr)
    // {
    //     $ctr_out = Counter::where('id', '=', $idctr)->first(); // first return row 
    //     $ctr_out->operator=null;
    //     $ctr_out->tanggal=null;
    //     $ctr_out->save();
    //     Auth::logout();
    //     request()->session()->invalidate();
    //     request()->session()->regenerateToken();
    //     return redirect('/login');
    // }

}
