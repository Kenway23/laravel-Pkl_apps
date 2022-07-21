<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function grade($a){
        if($a<=100 && $a >=90){
            $b = 'A';
        }else if($a <= 90 && $a >= 80){
            $b = 'B';
        }else if($a <= 80 && $a >= 70){
            $b = 'C';
        }else if($a <= 70 && $a >= 50){
            $b = 'D';
        }else if($a <= 50 && $a >= 30){
            $b = 'E';
        }else if($a < 30 && $a >= 0){
            $b = 'E';
        }else{
            $b = 'Grade EROR';
        }

        return $b;
    }

    public function index()
    {
        //
        $a = Nilai::all();
        return view('nilai.index', ['nilai' => $a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nis' => 'required|:nilai|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $post = new Nilai();
        $post->nis = $request->nis;
        $post->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $post->nilai = $request->nilai;
        $post->grade = $this->grade($post->nilai);
        $post->save();
        return redirect()->route('nilai.index')->with('succes', 
            'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Nilai::findOrFail($id);
        return view ('nilai.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Nilai::findOrFail($id);
        return view ('nilai.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nis' => 'required|:nilai|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);
        $post = Nilai::findOrfail($id);

        $post->nis = $request->nis;
        $post->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $post->nilai = $request->nilai;
        $post->grade = $this->grade($post->nilai);
        $post->save();
        return redirect()->route('nilai.index')->with('succes', 
            'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Nilai::findOrFail($id);
        $post->delete();
        return redirect()->route('nilai.index')->with('succes', 
            'Data berhasil dihapus!');
    }
}