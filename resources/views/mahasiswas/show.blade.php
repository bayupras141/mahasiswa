@extends('mahasiswas.layout')
  
@section('content')
<div class="col-md-4">
    <h1>Detail Mahasiswa</h1>
    <div class="card">
        <div class="card-body">
            <b>Nim : </b> {{$mahasiswa->nim}}
            <br><br>
            <b>Nama : </b> {{$mahasiswa->nama}}
            <br><br>
            <b>Email : </b> {{$mahasiswa->email}}
            <br> <br>
            <b>Kelas : </b> {{$mahasiswa->kelas->nama_kelas}}
            <br><br>
            <b>Jurusan : </b> {{$mahasiswa->jurusan}}
            <br><br>
            <b>Tanggal lahir : </b> {{$mahasiswa->tgl_lahir}}
            <br><br>
            <b>No Handphone : </b> {{$mahasiswa->no_hp}}
        </div>
    </div>
    <br>
    <a class="btn btn-danger" href="{{route('mahasiswas.index')}}">Kembali</a>
    <a class="btn btn-primary" href="{{route('mahasiswas.edit', $mahasiswa->nim)}}">edit</a>
</div>

@endsection