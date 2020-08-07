<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Carbon\Carbon;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = DB::table('pertanyaan')->select('id','judul', 'isi', 'created_at', 'updated_at')->get();
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

        $query = DB::table('pertanyaan')->insert(['judul' => $judul,'isi' => $isi, 'created_at' => $current_date_time, 'updated_at' => $current_date_time]);

        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Dikirim');
    }

    public function show($id){
        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
        return view('pertanyaan.detail', compact('pertanyaan'));
    }

    public function edit($id){
        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
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

        $query = DB::table('pertanyaan')->where('id',$id)->update([
            'judul' => $judul,
            'isi' => $isi,
            'updated_at' => $current_date_time
        ]);

        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Diubah');
    }

    public function destroy($id){
        $query = DB::table('pertanyaan')->where('id',$id)->delete();
        return redirect('/pertanyaan')->with('success','Pertanyaan Berhasil Dihapus');
    }
}