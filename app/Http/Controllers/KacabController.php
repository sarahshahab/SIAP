<?php

namespace App\Http\Controllers;

use App\Kantor;
use Illuminate\Http\Request;

class KacabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Kantor::all();
        return view ('admin.pages.kantor', compact('data'),[
            'title' => 'Kelola Data Kantor',
            'active' => 'Kelola Kantor'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tambah-kantor', [
            'title' => 'Tambah Data Kantor',
            'active' => 'Kelola Kantor']);
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
            'kantor' => 'required|unique:kantors',
            'lokasi' => 'required',
        ]);
        Kantor::create($request->all());

        return redirect()->route('kantor.index')->with('success', 'Data Lokasi Kantor Cabang Baru Telah Tersimpan');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the shark
        $data = Kantor::find($id);

        // show the view and pass the shark to it
        return view ('admin.pages.edit-kantor', compact('data'),[
          'title' => 'Kelola Data Kantor',
          'active' => 'Kelola Kantor'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kantor.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kantor $kantor)
    {
        $rules = [
            'lokasi' => 'required',
        ];

        if($request->kantor != $kantor->kantor) {
            $rules['kantor'] = 'required|unique:kantors';
        }

        $validateData = $request->validate($rules);

        // return dd($validateData);
        $kantor->update($validateData);
        return redirect()->route('kantor.index')->with('success','Data Lokasi Kantor Cabang Berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kantor $kantor)
    {
        $kantor->delete();

        return redirect()->route('kantor.index')->with('success','Kantor Cabang Berhasil dihapus!');
    }
}
