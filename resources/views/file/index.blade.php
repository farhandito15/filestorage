@extends('layout.master')

@section('content')
<div class="container">
    <h1>Data File</h1>
    <a href="{{ route('file.create') }}" class="btn btn-primary">Tambah Data +</a>

    <table class="table table-dark">
        <tr>
            <th>No.</th>
            <th>Nama File</th>
            <th>File</th>

            <th>Action</th>
        </tr>
        @foreach ($file as $faq)

        <tr>
            <td>{{$faq->id}}</td>
            <td>{{$faq->nama}}</td>
            <td><a href="{{ url(\Illuminate\Support\Facades\Storage::disk('public')->url($faq->file)) }}" target="_blank" rel="noreferrer" class="btn btn-info">Lihat File</a></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('file.edit', $faq) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('file.destroy', $faq) }}" method="POST">
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