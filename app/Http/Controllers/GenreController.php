<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $query=Genre::query()->where('user_id',auth()->id());
        if($request->has('search') && $request->search != ''){
            $query->where('namaGenre','like','%'.$request->search.'%');
        }
        $gen=$query->paginate(10);
        return view('gen.index',compact('gen'));
    }
    public function create()
    {
        return view('gen.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'namaGenre'=>'required',
        ]);
        $gen=Genre::create([
            'namaGenre'=>$request->namaGenre,
            'user_id'=>auth()->id(),
        ]);
        return redirect()->route('create.genre')->with('success','Berhasil menambah Genre');
    }
    public function show(string $id)
    {
        $gen=Genre::findOrFail($id);
        return view('gen.show',compact('gen'));
    }
    public function edit(string $id)
    {
        $gen=Genre::findOrFail($id);
        return view('gen.edit',compact('gen'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaGenre'=>'required',
        ]);
        $gen=Genre::findOrFail($id);
        $gen->update($request->all());
        return redirect()->route('daftar.genre');
    }
    public function destroy(string $id)
    {
        $gen=Genre::findOrFail($id);
        $gen->delete();
        return redirect()->route('daftar.genre');
    }
}
