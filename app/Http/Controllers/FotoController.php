<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use GuzzleHttp\Psr7\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('foto.index', [
            'foto' => Foto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotoRequest $request)
    {
        try {
            Foto::create([
                'nama' => $request->nama,
                'gambar' => $request->file('gambar')->storePublicly('img'),
            ]);
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menambahkan data: ' . $th->getMessage());
        }

        return redirect()->route('foto.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        return view('foto.edit', [
            'foto' => $foto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoRequest  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotoRequest  $request, Foto $foto)
    {
        \Illuminate\Support\Facades\Storage::delete($foto->gambar);

        try {
            $foto->update([
                'nama' => $request->nama,
                'gambar' => $request->file('gambar')->storePublicly('img'),
            ]);
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menambahkan data: ' . $th->getMessage());
        }
        return redirect()->route('foto.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        try {
            $foto->delete();
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menghapus data: ' . $th->getMessage());
        }

        return redirect()->route('foto.index')->with('succes', 'Berhasil Menghapus Data');
    }
}
