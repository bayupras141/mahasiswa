@extends('mahasiswas.layout')
@include('sweetalert::alert')
@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2> JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <form action="{{route('mahasiswas.index')}}">
                <div class="input-group mb-3">
                    <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Pencarian.."/>
                    <div class="input-group-append">
                        <input type="submit" value="Cari" class="btn btn-primary">
                    </div>
                </div>
            </form>
            <div class="col-md-4">
                <a class="btn btn-success" href="{{route('mahasiswas.create')}}">Input Mahasiswa</a>
            </div>
        </div>
    </div>
</div>
    <br>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif    
    <div class="col-12">
     <table class="table table-bordered" border="1">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Tanggal Lahir</th>
            <th>No Handphone</th>
            <th>Action</th>
        </tr>
        @foreach ($tableMhs as $item)
        <tr>
            <td> {{ $item->nim }} </td>
            <td> {{ $item->nama }} </td>
            <td> {{ $item->email }} </td>
            <td> {{ $item->kelas->nama_kelas }} </td>
            <td> {{ $item->jurusan }} </td>
            <td> {{ $item->tgl_lahir }} </td>
            <td> {{ $item->no_hp }} </td>
            <td>
                 <a class="btn btn-primary" href="{{route('mahasiswas.show', $item->nim)}}">Show</a>
                 <a class="btn btn-success" href="{{route('mahasiswas.edit', $item->nim)}}">edit</a>
                 <form onsubmit="return confirm('Aakah anda yakin ingin menghapus?')" class="d-inline" action="{{route('mahasiswas.destroy', $item->nim)}}" method="POST">
                 @csrf
                 <input type="hidden" name="_method" value="DELETE">
                 <input type="submit" value="Delete" class="btn btn-danger btn-sm">
             </form>                
            </td>
        </tr>
    @endforeach
    </table>
    {{ $tableMhs->links() }}
</div>
@endsection