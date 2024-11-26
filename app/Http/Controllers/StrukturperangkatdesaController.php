<?php

namespace App\Http\Controllers;

use App\Models\Strukturperangkatdesa;
use App\Http\Requests\StoreStrukturperangkatdesaRequest;
use App\Http\Requests\UpdateStrukturperangkatdesaRequest;

class StrukturperangkatdesaController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStrukturperangkatdesaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Strukturperangkatdesa $strukturperangkatdesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strukturperangkatdesa $strukturperangkatdesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Strukturperangkatdesa $strukturperangkatdesa)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar_strukturdesa' => 'image'
        ]);
        if($request->file('gambar_strukturdesa')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_strukturdesa'] = $request->file('gambar_strukturdesa')->store('gambar_yang_tersimpan');
        }
        Strukturperangkatdesa::where('id', $request->input('id'))
            ->update($validatedData);

        return redirect('/perangkatdesa')->with('success', 'Struktur Perangkat desa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Strukturperangkatdesa $strukturperangkatdesa)
    {
        //
    }
}