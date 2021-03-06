<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\MahasiswaMataKuliah;
use Illuminate\Http\Request;
use DB;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tableMhs = Mahasiswa::with('kelas')->orderBy('nim','asc')->simplePaginate(5);
        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $tableMhs = Mahasiswa::with('kelas')->where('nama', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        return view('mahasiswas.index', compact('tableMhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new \App\Models\Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->kelas_id = $request->kelas_id;
        if($request->file('foto')){
            $file = $request->file('foto')->store('images', 'public');
            $mahasiswa->foto = $file;
        }
        
        $mahasiswa->save();
        return redirect()->route('mahasiswas.index')->with('status', 'Berhasil menabah mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('kelas')->find($id);
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $kelas = Kelas::all();
        $mahasiswa = Mahasiswa::with('kelas')->find($id);
        // @dd($mahasiswa);
        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->email = $request->email;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        if($request->file('foto')){
            if($mahasiswa->foto && file_exists(storage_path('app/public/' .$mahasiswa->foto))){
                \Storage::delete('public/'.$mahasiswa->foto);
            }
            $file = $request->file('foto')->store('images', 'public');
            $mahasiswa->foto = $file;
        }
            
        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')->with('status', 'Berhasil mengubah mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('status', 'Berhasil menghapus mahasiswa');
    }

    public function nilai($id)
    {
        $mahasiswa = Mahasiswa::with('kelas')->find($id);
        // $mahasiswa_matakuliah = DB::table('mahasiswa_matakuliah')->where('name', 'John')->value('email');
        // $mahasiswa_matakuliah = MahasiswaMataKuliah::with('mataKuliah')->where('mahasiswa_id', $id)->get();

        $mahasiswa_matakuliah = DB::table('mahasiswa_matakuliah')
            ->join('matakuliah', 'matakuliah.id', '=', 'mahasiswa_matakuliah.matakuliah_id')
            ->join('mahasiswa', 'mahasiswa.id', '=', 'mahasiswa_matakuliah.mahasiswa_id')
            ->select('mahasiswa_matakuliah.*', 'matakuliah.*')
            ->where('mahasiswa_id', $id)
            ->get();
        // @dd($mahasiswa_matakuliah);
        return view('mahasiswas.nilai', compact('mahasiswa', 'mahasiswa_matakuliah'));
    }

    // create function cetak_pdf
    public function cetak_pdf($id)
    {
        $mahasiswa = Mahasiswa::with('kelas')->find($id);

        $mahasiswa_matakuliah = DB::table('mahasiswa_matakuliah')
            ->join('matakuliah', 'matakuliah.id', '=', 'mahasiswa_matakuliah.matakuliah_id')
            ->join('mahasiswa', 'mahasiswa.id', '=', 'mahasiswa_matakuliah.mahasiswa_id')
            ->select('mahasiswa_matakuliah.*', 'matakuliah.*')
            ->where('mahasiswa_id', $id)
            ->get();
        // @dd($mahasiswa_matakuliah);
        $pdf = PDF::loadview('mahasiswas.pdf', compact('mahasiswa','mahasiswa_matakuliah'));
        return $pdf->stream();
    }

}
