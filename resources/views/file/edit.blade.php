@extends('layout.master')

@section('content')

<div class="container">

    <h1>Edit File</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('file.update', $file) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama File</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $file->nama }}">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Ubah File</label>
            <input class="form-control" type="file" id="formFile" name="file">
        </div>

        <div class="mb-3">
            <input type="text" name="gambar" value="{{ $file->file }}" readonly class="form-control">

        </div>

        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        <a href="{{ route('file.index') }}" class="btn btn-danger">Kembali</a>


    </form>
</div>

@endsection