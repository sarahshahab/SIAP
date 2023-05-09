<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Antrean;
use App\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function tampil_status($tgl, $lay1, $lay2, $lks)
    {       
        $where=[]; 
        ($tgl != 'none') ? $where[] = ['tanggal','=', $tgl] : '';
        ($lks != 'none') ? $where[] = ['id_kantor', '=', $lks] : '';
        ($lay1 != 'none') ? $where[] = ['id_layanan', '=', $lay1] : '';
        ($lay2 == 'none') ? $where[] = ['id_layanan', '=', $lay2] : '';
         $where[] = ['status', '!=' , 'selesai'];
         $where[] = ['status', '!=' , 'tunda'];
         $where[] = ['status', '!=' , 'tunggu'];

        $ant;
        $jdl="Data Antrian : ";

        if ($where) 
        { // dgn filter            
            $ant = Antrean::where($where)
            ->orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')
            ->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }
        else  // tanpa filter
        {
            $ant = Antrean::orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')
            ->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }

        //lay2
        $dmn=[]; 
        ($tgl != 'none') ? $dmn[] = ['tanggal','=', $tgl] : '';
        ($lks != 'none') ? $dmn[] = ['id_kantor', '=', $lks] : '';
        ($lay1 == 'none') ? $dmn[] = ['id_layanan', '=', $lay1] : '';
        ($lay2 != 'none') ? $dmn[] = ['id_layanan', '=', $lay2] : '';
         $dmn[] = ['status', '!=' , 'selesai'];
         $dmn[] = ['status', '!=' , 'tunda'];
         $dmn[] = ['status', '!=' , 'tunggu'];

        $antre;

        if ($dmn) 
        { // dgn filter            

            $antre = Antrean::where($dmn)
            ->orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')
            ->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }
        else  // tanpa filter
        {
            $antre = Antrean::orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')
            ->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }

        $tgl = Antrean::select('tanggal')->groupBy('tanggal')->get();
        $lyn1 = Layanan::select('pelayanan')->where('id_layanan', '=', $lay1)->first();
        $lyn2 = Layanan::select('pelayanan')->where('id_layanan', '=', $lay2)->first();
        $ktr = Kantor::select('kantor')->where('id_kantor', '=', $lks)->first(); 



        return view('operator.pages.displayform',[
            'Antri' => $ant,
            'Antre' => $antre,
            'Tggl' => $tgl,
            'Lyana' => $lyn1->pelayanan,
            'Lyani' => $lyn2->pelayanan,
            'Lksi' => $ktr->kantor,
            'title' => 'Display Counter'
        ]);
    }

    public function out()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/'); // balik ke beranda
    }
}
