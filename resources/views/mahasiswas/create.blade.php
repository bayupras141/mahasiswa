@extends('mahasiswas.layout')
 @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Tambah Mahasiswa Baru</h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{route('mahasiswas.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Nim</label>
                            <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="Silahkan isi nim..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Silahkan isi nama..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Silahkan isi email..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                @foreach($kelas as $k)
                                    <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                                @endforeach
                            </select>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Silahkan isi jurusan..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Tanggal lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Silahkan isi tanggal lahir..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">No Handphone</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Silahkan isi no handphone..">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Foto</label>
                            <br>
                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                            @error('picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Tambah!</button>
                            <a class="btn btn-danger" href="{{route('mahasiswas.index')}}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection