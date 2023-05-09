<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Kantor;
use App\Antrean;
use App\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    // Untuk Penggunjung 

    public function index ()
    {
        return $this->filter('-- Kosong --','-- Kosong --','-- Kosong --','-- Kosong --');
    }

    public function filter($tgl, $lok, $lay, $stats)
    {       
        $where=[]; 
        ($tgl != '-- Kosong --') ? $where[] = ['tanggal','=', $tgl] : '';
        ($lok != '-- Kosong --') ? $where[] = ['id_kantor', '=', $lok] : '';
        ($lay != '-- Kosong --') ? $where[] = ['id_layanan', '=', $lay] : '';
        ($stats != '-- Kosong --') ? $where[] = ['status', '=', $stats] : '';

        // $jdl="Data Antrian";

        if ($where) { // dgn filter            
            foreach ($where as $value)

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
        $tgl = Antrean::select('tanggal')->groupBy('tanggal')->get();
        $lyn = Layanan::all();   
        $kantor = Kantor::all();
        $opr = User::select('id')->get('nama');

        // $kantor = Kantor::with('kantors')->get(); 
        // $announcement = Announcement::orderBy('id','desc')->with('company')->get();
        // return dd($ktr);
        return view('admin.pages.pengunjung', compact('ant', 'lyn', 'opr', 'kantor', 'tgl'), [
            'title' => 'Kelola Data Pengunjung',
            'active' => 'Data Pengunjung'
        ]);
    }

    public function show($id, User $user)
    {
        // get the shark
            $kantor = Kantor::all();
            $lyn = Layanan::all();
            $ant = Antrean::find($id);
            // $opr = User::where('id_operator', '=', $user->id) ? "";
            // $kan=Kantor::where('id_kantor', '=', $request->id_kantor)->get(['kantor']); 
        // show the view and pass the shark to it
        return view ('admin.pages.show-pengunjung', compact('kantor', 'lyn', 'ant'),[
          'title' => 'Kelola Data Pengunjung',
          'active' => 'Kelola Pengunjung'
        ]);
    }

    public function delete($del_id) {
        $pengunjung=Antrean::find($del_id);      
        $pengunjung->delete($pengunjung->id);      
        return redirect()->back(); 
    }

    public function delete_all(Request $request) 
    {

        // $allParams = $request->get('ids');  // get collection of ids from req
        // $inArray = json_encode($allParams); // convert to json str (viewable)

        // Antrian::whereIn('id', $ids)->delete(); 
        // return response()->json(['success'=> "Data berhasil dihapus!"]); 
        // $ids = $request->ids;
        // DB::table("antreans")->whereIn('id',explode(",",$ids))->delete();
        // return response()->json(['success'=>"Data berhasil dihapus."]);
        // $antreans_id = $request->get('ids');  // get collection of ids from req
        // $inArray = json_encode($antreans_id); // convert to json str (viewable)

        // Antrean::whereIn('id', $antreans_id)->delete(); 
        // return response()->json(['code'=> 1, 'msg'=> 'Data pelanggan berhasil dihapus!']);   

        // $allParams = $request->get('ids');  // get collection of ids from req
        // $inArray = json_encode($allParams); // convert to json str (viewable)

        // Antrean::whereIn('id', $allParams)->delete(); 
        // return response()->json(['success'=> $allParams]);   

        // $ids = $request->ids;
        // DB::table("antreans")->whereIn('id',explode(",",$ids))->delete();
        

        $ids = $request->input('id');
        $pengunjung = Antrean::whereIn('id', $ids);
        if($pengunjung->delete())
        {
            echo 'Data terpilih berhasil terhapus!';
        }

        // Antrean::whereIn('id', $request->get('selected'))->delete();
        // return response("Selected post(s) deleted successfully.", 200);

    }
}
