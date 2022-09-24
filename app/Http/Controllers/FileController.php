<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.index', [
            'file' => File::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        File::create([
            'nama' => $request->nama,
            'file' => $request->file('file')->storePublicly('img'),
        ]);

        return redirect()->route('file.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('file.edit', [
            'file' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        \Illuminate\Support\Facades\Storage::delete($file->file);
        $file->update([
            'nama' => $request->nama,
            'file' => $request->file('file')->storePublicly('img'),
        ]);

        return redirect()->route('file.index')->with('succes', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        try {
            $file->delete();
        } catch (\Throwable $th) {
            return redirect()->with('error', 'Gagal menghapus data: ' . $th->getMessage());
        }

        return redirect()->route('file.index')->with('succes', 'Berhasil Menghapus Data');
    }
}
