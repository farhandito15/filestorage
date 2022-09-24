@extends('layout.master')

@section('content')
<div class="container">
    <h1>Data Foto</h1>
    <a href="{{ route('foto.create') }}" class="btn btn-primary">Tambah Data +</a>

    <table class="table table-dark">
        <tr>
            <th>No.</th>
            <th>Nama Foto</th>
            <th>Gambar</th>

            <th>Action</th>
        </tr>
        @foreach ($foto as $f)

        <tr>
            <td>{{$f->id}}</td>
            <td>{{$f->nama}}</td>
            <td><a href="{{ url(\Illuminate\Support\Facades\Storage::disk('public')->url($f->gambar)) }}" target="_blank" rel="noreferrer" class="btn btn-info">Lihat Foto</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('foto.edit', $f) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('foto.destroy', $f) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection