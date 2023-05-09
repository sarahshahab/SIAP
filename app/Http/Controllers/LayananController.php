<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Layanan::all();
        return view ('admin.pages.layanan', compact('data'),[
            'title' => 'Kelola Data Layanan',
            'active' => 'Kelola Layanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tambah-layanan', [
            'title' => 'Tambah Data Layanan',
            'active' => 'Kelola Layanan']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelayanan' => 'required',
        ]);
        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Data Layanan Kantor Cabang Baru Telah Tersimpan!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the shark
        $data = Layanan::find($id);

        // show the view and pass the shark to it
        return view ('admin.pages.edit-layanan', compact('data'),[
          'title' => 'Kelola Data Layanan',
          'active' => 'Kelola Layanan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        $rules = [];

        if($request->pelayanan != $layanan->pelayanan) {
            $rules['pelayanan'] = 'required|unique:layanans';
        }

        $validateData = $request->validate($rules);

        // return dd($validateData);
        $layanan->update($validateData);
        return redirect()->route('layanan.index')->with('success','Data Layanan Kantor Cabang Berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success','Layanan Cabang Berhasil di Hapus');
    }
}
