@extends('mahasiswas.layout')
 @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Mahasiswa Baru</h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{route('mahasiswas.update', $mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="title">Nim</label>
                            <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" value="{{$mahasiswa->nim}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$mahasiswa->nama}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$mahasiswa->email}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                @foreach($kelas as $k)
                                    <option value="{{$k->id}}">{{$mahasiswa->kelas->nama_kelas}}</option>
                                @endforeach
                            </select>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{$mahasiswa->jurusan}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{$mahasiswa->tgl_lahir}}>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">No Handphone</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{$mahasiswa->no_hp}}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Foto</label>
                            <br>
                            <img width="150px" src="{{asset('storage/'.$mahasiswa->foto)}}">
                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" value="Simpan!"/>
                            <a class="btn btn-danger" href="{{route('mahasiswas.index')}}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection