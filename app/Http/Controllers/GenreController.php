<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gen=Genre::all();
        return view('gen.index',compact('gen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaGenre'=>'required',
        ]);
        $gen=Genre::create($request->all());
        return redirect()->route('daftar.genre');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gen=Genre::findOrFail($id);
        return view('gen.show',compact('gen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gen=Genre::findOrFail($id);
        return view('gen.edit',compact('gen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaGenre'=>'required',
        ]);
        $gen=findOrFail($id);
        $gen->update($request->all());
        return redirect()->route('daftar.genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gen=Genre::findOrFail($id);
        $gen->delete();
        return redirect()->route('daftar.genre');
    }
}
