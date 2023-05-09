<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Antrean;
use App\Counter;
use App\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CounterBoardController extends Controller
{
    public function ganti_stt(Request $request)
    { 
        $allParams = $request->get('dtdrblade');  // get collection of ids from req
        $id_antrian = json_encode($allParams); // convert to json str (viewable)
        $user = Auth::user();
        
        // $allParams[0] = id antrian, $allParams[1] = status yg baru
        Antrean::where('id', $allParams[0])->update(['status' => $allParams[1], 'id_operator' => $user->id]);
        // Antrean::where('id', $allParams[0])->update(['id_operator' => $allParams[1]]);
        return response()->json(['success'=> $allParams[0]]); // sukses return id 
    }

    public function index($tgl,$lks,$lay,$opr,$idc)
    {       
        $where=[]; 
        ($tgl != 'none') ? $where[] = ['tanggal','=', $tgl] : '';
        ($lks != 'none') ? $where[] = ['id_kantor', '=', $lks] : '';
        ($lay != 'none') ? $where[] = ['id_layanan', '=', $lay] : '';
         $where[] = ['status', '!=', 'selesai'];
        //($stt != 'none') ? $where[] = ['status', '=', $stt] : '';

        $ant;
        $jdl="Data Antrian : ";

        if ($where) 
        { // dgn filter            
            foreach ($where as $value) {
                $jdl .= " (" . str_replace(",=,"," = ",implode(",",$value)) . ") ";
            }

            $ant = Antrean::where($where)
            ->orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }
        else  // tanpa filter
        {
            $jdl .= " All";
            $ant = Antrean::orderBy('tanggal','asc')
            ->orderBy('id_kantor','asc')->orderBy('id_layanan','asc')
            ->orderBy('nomor')->paginate(10);
        }
        $tgl = Antrean::select('tanggal')->groupBy('tanggal')->get();
        $lyn = Layanan::all();   
        $ktr = Kantor::all();

        return view('operator.pages.index',[
            'Antri'=>$ant, 
            'Lyan' => $lyn, 
            'Kntr'=> $ktr, 
            'Tggl'=>$tgl,
            'yglogin'=>$opr,
            'counter'=>$idc,
            'judul' => $jdl,
            'title' => 'Data Antrean Pengunjung Hari Ini',
            'active' => 'Data Pengunjung']);
    }

    public function out($idctr, $idopr)
    {
        $ctr_out = Counter::where('id', '=', $idctr)->first(); // first return row 
        $ctr_out->operator=null;
        $ctr_out->tanggal=null;
        $ctr_out->save();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
