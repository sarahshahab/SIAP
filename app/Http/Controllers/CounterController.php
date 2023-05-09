<?php

namespace App\Http\Controllers;

use App\Kantor;
use App\Counter;
use App\Layanan;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Counter::all();
        return view ('admin.pages.counter', compact('data'),[
            'title' => 'Kelola Data Counter',
            'active' => 'Kelola Counter'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lay = Layanan::all();   
        $kan = Kantor::all();   
        return view('admin.pages.tambah-counter', [
            'Lyn' => $lay, 
            'Kntr'=> $kan,
            'title' => 'Tambah Data Counter',
            'active' => 'Kelola Counter']);
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
            'id_kantor' => 'required',
            'id_layanan' => 'required',
            'id' => 'required|unique:counters',
            'nomor' => 'required'
        ]);
        Counter::create($request->all());

        return redirect()->route('counter.index')->with('success', 'Data Counter Baru Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /// get the shark
        $data = Counter::find($id);

        // show the view and pass the shark to it
        return view ('admin.pages.edit-counter', compact('data'),[
          'title' => 'Kelola Data Counter',
          'active' => 'Kelola Counter'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('layanan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
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
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success','Layanan Cabang Berhasil di Hapus');
    }
}
