<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewAny',Genre::class);
        $query=Genre::query()->where('user_id',Auth::id());
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
        $this->authorize('create',Genre::class);
        $request->validate([
            'namaGenre'=>'required',
        ]);
        Genre::create([
            'namaGenre'=>$request->namaGenre,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route('create.genre')->with('success','Berhasil menambah Genre');
    }
    public function show(string $id)
    {
        $gen=Genre::findOrFail($id);
        $this->authorize('view',$gen);
        return view('gen.show',compact('gen'));
    }
    public function edit(string $id)
    {
        $gen=Genre::findOrFail($id);
        $this->authorize('edit',$gen);
        return view('gen.edit',compact('gen'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaGenre'=>'required',
        ]);
        $gen=Genre::findOrFail($id);
        $this->authorize('update',$gen);
        $gen->update($request->all());
        return redirect()->route('daftar.genre');
    }
    public function destroy(string $id)
    {
        $gen=Genre::findOrFail($id);
        $this->authorize('delete',$gen);
        $gen->delete();
        return redirect()->route('daftar.genre');
    }
}
