<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
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
    
    public function index()
    {
        //
        $a = Siswa::all();
        return view('siswa.index',['siswa'=>$a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa.create');
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
            'nis'=> 'required|:siswa|max::255',
            'nama_siswa'=> 'required',
            'alamat_siswa'=> 'required',
            'tanggal_lahir'=> 'required',
        ]);

        $post = new Siswa();
        $post->nis =$request->nis;
        $post->nama_siswa =$request->nama_siswa;
        $post->alamat_siswa =$request->alamat_siswa;
        $post->tanggal_lahir =$request->tanggal_lahir;
        $post->save();
        return redirect()->route('siswa.index')->with('succes','Data Berhasil dibuat');
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
        $post = Siswa::findOrfail($id);
        return view('siswa.show',compact('post'));
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
        $post = Siswa::findOrfail($id);
        return view('siswa.edit',compact('post'));
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
            'nis'=> 'required|:siswa|max::255',
            'nama_siswa'=> 'required',
            'alamat_siswa'=> 'required',
            'tanggal_lahir'=> 'required',
        ]);
        $post = Siswa::findOrfail($id);

    
        $post->nis =$request->nis;
        $post->nama_siswa =$request->nama_siswa;
        $post->alamat_siswa =$request->alamat_siswa;
        $post->tanggal_lahir =$request->tanggal_lahir;
        $post->save();
        return redirect()->route('siswa.index')->with('succes','Data Berhasil diedit');
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
        $post = Siswa::findOrfail($id);
        $post->delete();
        return redirect()->route('siswa.index')->with('succes','Data Berhasil dihapus');
    }
}
