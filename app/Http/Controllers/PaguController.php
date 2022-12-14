<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagu;
class PaguController extends Controller
{
    public function index(Request $request){
        $data = [
            'pagu'=>Pagu::get(),
        ];
        return view('pagu', $data);
    }
    public function get_pagu_data(Request $request){
        $akun = $request->input('akun');
        $data = Pagu::where('akun',$akun)->get()[0];
        if($data->count()>0) return response()->json($data);
    }
    public function get_pagu_data_by_id(Request $request){
        $id_pagu = $request->input('id_pagu');
        $data = Pagu::find($id_pagu);
        if($data->count()>0) return response()->json($data);
    }

    public function add_pagu(Request $request){
        $valid_input = $request->validate([
            'id_pagu'=> 'nullable',  
            'akun'=> 'required',  
            'pagu'=> 'required',  
            'realisasi'=> 'required',  
            'sisa'=> 'required',  
            'ket'=> 'nullable',  
        ]);
        $valid_input['sisa'] = $valid_input['pagu'] - $valid_input['realisasi'];
        // upsert
        $res = Pagu::updateOrCreate(['akun'=>$valid_input['akun']],$valid_input);
        return redirect()->back()->with('msg-success', 'Data berhasil dirubah');
    }

    public function delete_pagu($id){
        $data = Pagu::where('id_pagu', $id)->delete();
        if($data){
            return redirect()->route('pagu')->with('msg-warning', 'Data berhasil dihapus');
        } else{
            return redirect()->route('pagu')->with('msg-error', 'Data gagal dihapus');
        }
    }
}
