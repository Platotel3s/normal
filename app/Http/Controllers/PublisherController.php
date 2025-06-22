<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers=Penerbit::paginate(5);
        return view('publisher.index',compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPenerbit'=>'required',
            'alamat'=>'required',
        ]);
        $publishers=Penerbit::create($request->all());
        return redirect()->route('create.penerbit')->with('success','Berhasil menambah daftar penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        return view('publisher.show',compact('publishers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        return view('publisher.edit',compact('publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaPenerbit'=>'required',
            'alamat'=>'required',
        ]);
        $publishers=Penerbit::findOrFail($id);
        $publishers->update($request->all());
        return redirect()->route('daftar.penerbit')->with('success','Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        $publishers->delete();
        return redirect()->route('daftar.penerbit')->with('success','Berhasil menghapus');
    }
}
