<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Antrean;
use App\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukDisplayController extends Controller
{
    public function index ()
    {
        $tgl = Carbon::now('+7:00')->format('Y-m-d');;
        $lyn = Layanan::all();   
        $ktr = Kantor::all();
        return view ('operator.dashboard.displayloginform', [
            'Tggl'=>$tgl, 
            'Kntr'=> $ktr, 
            'Lyan'=>$lyn,
            'title' => 'Halaman Login']
        );
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'ktr' => 'required',  // kantor yg akan ditampilakan
            'lay1' => 'required',  // kantor yg akan ditampilakan
            'lay2' => 'required',  // kantor yg akan ditampilakan
        ]);

        $tan = Carbon::now('+7:00')->format('Y-m-d');;
        
        $user = Auth::user()->first();
        if($user) {
        return redirect("/display/$tan/$request->lay1/$request->lay2/$request->ktr");
        } else return back()->with('fail', 'email ini tidak terdaftar!'); 
    }
}
