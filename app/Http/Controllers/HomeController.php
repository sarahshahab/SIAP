<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Antrean;
use App\Layanan;
use Carbon\Carbon;
use App\Traits\WablasTrait;
use Illuminate\Http\Request;
use App\Rules\DateAntreanRule;
use App\Rules\NoPelangganRule;

class HomeController extends Controller
{
    public function index()
    {
        $lay = Layanan::all();   
        $kan = Kantor::all();   

        // kirim ke blade
        // $kantor = Kantor::pluck('nama_tempat', 'id_kantor');
        // $layanan = DB::table('layanans')->get();
        return view( 'antrian.index', [
            "title" => "Antrian Online Pelayanan Pelanggan PDAM Tirta Khatulistiwa Pontianak",
            'Lyn' => $lay, 
            'Kntr'=> $kan,
            // 'kantor' => $kantor, 
        ]);
    }

    public function store(Request $request)
    {
        {
            $request->validate([
              'id_kantor' => 'required',
              'id_layanan' => 'required',
              'tanggal' => [
                'required',
                 new DateAntreanRule()
                ],
 
              'telepon' => 'required|unique:antreans',
              'nama'=> 'required',
              'nomor_pelanggan' => [
                new NoPelangganRule()
            ]
          ]);
          $pendaftar = new Antrean;
          $pendaftar->id_kantor = $request->id_kantor; 
          $pendaftar->id_layanan = $request->id_layanan;
          $pendaftar->tanggal = $request->tanggal;
          $pendaftar->telepon = $request->telepon;
          $pendaftar->nomor_pelanggan = $request->nomor_pelanggan;
          $pendaftar->nama_pelanggan = $request->nama;
          $pendaftar->save();

          $lay=Layanan::where('id_layanan', '=', $request->id_layanan)->get(['pelayanan']); 
          $kan=Kantor::where('id_kantor', '=', $request->id_kantor)->get(['kantor']); 

          $tng = $request->tanggal;
          $tbr = Carbon::createFromFormat('Y-m-d', $tng)
          ->format('d/m/Y');
          $num = ($request->nomor_pelanggan) ? $request->nomor_pelanggan: "tidak dituliskan";

          $kumpulan_data = [];
        $data['phone'] = $request->telepon;
        $data['message'] = "Reservasi antrean atas nama *{$request->nama}* pada tanggal *{$tbr}*, untuk pelayanan *{$lay[0]->pelayanan}*, pada lokasi *{$kan[0]->kantor}* dengan nomor pelanggan *{$num}* telah dibuat dengan nomor antrean *{$pendaftar->fresh()->nomor}*! Silahkan datang sesuai dengan jadwal yang telah didaftarkan! Untuk melihat antrean yang sedang berlangsung pada hari yang dijadwalkan, klik link berikut: /display/{$tng}/1/2/{$request->id_layanan}";
        $data['secret'] = false;
        $data['retry'] = false;
        $data['isGroup'] = false;
        array_push($kumpulan_data, $data);
        WablasTrait::sendText($kumpulan_data);
        
        return redirect()->route('rolling', 
          ['nm' => $request->nama, 
          'tel' => $request->telepon, 
          'tgl' => $request->tanggal, 
          'no' => ($request->nomor_pelanggan) ? $request->nomor_pelanggan: "00", 
          //   'layanan' => $request->nama_layanan, // ini baliknya ke finishform bukan kode
          //   'tempat' => $request->nama_tempat, // ini baliknya ke finishform bukan kode
          'lay' => $lay[0]->pelayanan, // ini baliknya ke finishform bukan kode
          'lok' => $kan[0]->kantor, // ini baliknya ke finishform bukan kode
          
          'ttl' => 'Pendaftaran sukses',
          'top' => 'No. Antrian',
          'mid' => $pendaftar->fresh()->nomor,
          'low' => 'Mohon Datang pada waktunya!']);
        } 
    }

    public function enrolling($nm, $tel, $tgl, $no, $lay, $lok, $ttl, $top, $mid, $low)
    {

        $tbr = Carbon::createFromFormat('Y-m-d', $tgl)
          ->format('d/m/Y');

        // $where=[]; 
        // ($no != '') ? $where[] = ['nomor_pelanggan','=', $no] : '';

            // setelah simpan bawa data no antrian
            return view('antrian.confirm',[
              'title' => "SIAP | Pendaftaran Berhasil!",
              'nama' => $nm, 
              'telepon' => $tel, 
              'tanggal' => $tbr, 
              'nomor' => $no,
              'layanan' => $lay,  
              'tempat' => $lok, 
              'ttl' => $top,
              'atas'=>$top,
              'tengah'=>$mid,
              'bawah'=>$low
            ]);
            
        }
}
