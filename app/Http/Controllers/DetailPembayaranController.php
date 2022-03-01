<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPembayaranController extends Controller
{
    public function index(){
        return view('detail-pembayaran', [
            'title' => 'Detail Pelayanan Pembayaran'
        ]);
    }
}
