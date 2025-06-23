<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Author::query();
        if($request->has('search') && $request->search != ''){
            $query->where('namaPenulis','like','%'.$request->search.'%');
        }
        $authors=$query->paginate(10);
        return view('author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPenulis'=>'required|string',
        ]);
        $authors=Author::create([
            'namaPenulis'=>$request->namaPenulis,
        ]);
        return redirect()->route('create.author')->with('success','Berhasil menambah penulis');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authors=Author::findOrFail($id);
        return view('author.index',compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authors=Author::findOrFail($id);
        return view('author.edit',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaPenulis'=>'required',
        ]);
        $authors=Author::findOrFail($id);
        $authors->update($request->all());
        return redirect()->route('daftar.author')->with('success','Berhasil mengubah nama penulis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authors=Author::findOrFail($id);
        $authors->delete();
        return redirect()->route('daftar.author')->with('success','Berhasil menghapus');
    }
}
