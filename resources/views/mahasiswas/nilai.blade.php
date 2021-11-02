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
</div>
<div class="col-md-8">
     <table class="table table-bordered" border="1">
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        @foreach ($mahasiswa_matakuliah as $item)
        <tr>
            <td> {{ $item->nama_matkul }} </td>
            <td> {{ $item->sks }} </td>
            <td> {{ $item->semester }} </td>
            <td> {{ $item->nilai }} </td>
        </tr>
    @endforeach
    </table>
</div>

@endsection