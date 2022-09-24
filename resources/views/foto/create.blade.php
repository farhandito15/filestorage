@extends('layout.master')

@section('content')

<div class="container">

    <h1>Buat data</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Foto</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Foto</label>
            <input class="form-control" type="file" id="formFile" name="gambar">
        </div>

        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        <a href="{{ route('foto.index') }}" class="btn btn-danger">Kembali</a>


    </form>
</div>

@endsection