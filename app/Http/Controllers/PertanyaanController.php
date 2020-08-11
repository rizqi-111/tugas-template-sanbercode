<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

use App\Pertanyaan;

use Auth;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    
    public function index(){
        // $pertanyaan = DB::table('pertanyaan')->select('id','judul', 'isi', 'created_at', 'updated_at')->get();
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    public function create(){
        return view('pertanyaan.create');
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required|max:45',
            'isi' => 'required|max:255'
        ]); 

        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $current_date_time = Carbon::now()->toDateTimeString();

        // $query = DB::table('pertanyaan')->insert(['judul' => $judul,'isi' => $isi, 'created_at' => $current_date_time, 'updated_at' => $current_date_time]);
        
        // $pertanyaan = new Pertanyaan;
        // $pertanyaan->judul = $judul;
        // $pertanyaan->isi = $isi;
        // $pertanyaan->save();

        $pertanyaan = Pertanyaan::create([
            'judul' => $judul,
            'isi' => $isi,
            'profil_id' => Auth::user()->id
        ]);

        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Dikirim');
    }

    public function show($id){
        // $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.detail', compact('pertanyaan'));
    }

    public function edit($id){
        // $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    public function update($id,Request $request){
        $request->validate([
            'judul' => 'required|max:45',
            'isi' => 'required|max:255'
        ]); 

        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $current_date_time = Carbon::now()->toDateTimeString();

        // $query = DB::table('pertanyaan')->where('id',$id)->update([
        //     'judul' => $judul,
        //     'isi' => $isi,
        //     'updated_at' => $current_date_time
        // ]);

        $update = Pertanyaan::where('id',$id)->update([
            'judul' => $judul,
            'isi' => $isi
        ]);

        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Diubah');
    }

    public function destroy($id){
        // $query = DB::table('pertanyaan')->where('id',$id)->delete();

        Pertanyaan::destroy($id);
        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Dihapus');
    }
}