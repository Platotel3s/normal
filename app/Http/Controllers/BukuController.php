<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Author;
use App\Models\Penerbit;
use App\Models\Tahun;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus=Buku::with(['author','penerbit','tahun'])->get();
        return view('main.index',compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors=Author::all();
        $penerbits=Penerbit::all();
        $tahuns=Tahun::all();

        return view('main.create',compact(['authors','penerbits','tahuns']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required|string',
            'author_id'=>'required|exists:authors,id',
            'penerbit_id'=>'required|exists:penerbits,id',
            'tahun_id'=>'required|exists:tahuns,id',
        ]);
        Buku::create([
            'judul'=>$request->judul,
            'author_id'=>$request->author_id,
            'penerbit_id'=>$request->penerbit_id,
            'tahun_id'=>$request->tahun_id,
        ]);
        return redirect()->route('daftar.buku')->with('success','Berhasil input data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bukus=Buku::findOrFail($id);
        return view('main.show',compact('bukus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bukus=Buku::findOrFail($id);
        $authors=Author::all();
        $penerbits=Penerbit::all();
        $tahuns=Tahun::all();
        return view('main.edit',compact(['bukus','authors','penerbits','tahuns']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required|string',
            'author_id'=>'required|string',
            'penerbit_id'=>'required|string',
            'tahun_id'=>'required|integer',
        ]);
        $bukus=Buku::findOrFail($id);
        $bukus->update($request->all());
        return redirect()->route('daftar.buku')->with('success','Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bukus=Buku::findOrFail($id);
        $bukus->delete();
        return redirect()->route('daftar.buku')->with('success',$bukus->judul.' Berhasil dihapus');
    }
}
