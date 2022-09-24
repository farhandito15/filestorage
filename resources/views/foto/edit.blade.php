@extends('layout.master')

@section('content')

<div class="container">

    <h1>Edit Gambar</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('foto.update', $foto) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Foto</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $foto->nama }}">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Ubah Foto</label>
            <input class="form-control" type="file" id="formFile" name="gambar">
        </div>

        <div class="mb-3">
            <img src="{{url(\Illuminate\Support\Facades\Storage::disk('public')->url($foto->gambar))}}" height="10%" width="15%">
        </div>

        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        <a href="{{ route('foto.index') }}" class="btn btn-danger">Kembali</a>


    </form>
</div>

@endsection