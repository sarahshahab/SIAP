<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role_id', '=', '2')->get();
        //$data = User::all();
        //dd($data);
        return view ('admin.pages.operator', compact('data'),[
            'title' => 'Kelola Data Operator',
            'active' => 'Kelola Operator'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tambah-operator', [
            'title' => 'Tambah Data Operator',
            'active' => 'Kelola Operator']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'=> ['required']
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect()->route('operator.index')->with('success', 'Data Operator Baru Telah Tersimpan');
        // return dd($validateData);
    }

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$cari = $request->cari;
 
    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$opt = DB::table('users')
	// 	->where('id','like',"%".$cari."%")
	// 	->paginate();

    //     $data = User::where('role_id', '=', '2')->get();
 
    // 		// mengirim data pegawai ke view index
	// 	return view ('admin.pages.operator', compact('data', 'opt'),[
    //         'title' => 'Kelola Data Operator',
    //         'active' => 'Kelola Operator'
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // get the shark
        // $data = User::find($id);

        // // show the view and pass the shark to it
        // return view ('admin.pages.edit-operator', compact('data'),[
        //   'title' => 'Kelola Data Operator',
        //   'active' => 'Kelola Operator'
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('operator.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {     
        // $rules = [
        //     'nama' => ['required', 'string', 'max:255'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'role_id'=> ['required'],
        // ];
        
        // if($request->email != $user->email) {
        //     $rules['email'] = 'required|string|email:dns|max:255|unique:operators';
        // }
        
        // $rules['password'] = bcrypt($rules['password']);
        // $validateData = $request->validate($rules);

        // return dd($validateData);
        // $user->update($validateData);
        // return redirect()->route('operator.index')->with('success','Data Lokasi Kantor Cabang Berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete($user->id);      
        return redirect()->route('operator.index')->with('success','Data Operator Berhasil dihapus!');
    }
}
