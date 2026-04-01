<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Author;
use App\Models\Penerbit;
use App\Models\Tahun;
use App\Models\Genre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewAny',Buku::class);
        $query=Buku::with(['authors','penerbit','tahun','genre'])->where('user_id',Auth::id());
        if($request->has('search') && $request->search !=''){
            $query->where('judul','like','%'.$request->search.'%');
        }
        $bukus=$query->paginate(5);
        return view('main.index',compact('bukus'));
    }
    public function create()
    {
        $this->authorize('create',Buku::class);
        $authors=Author::where('user_id',Auth::id())->get();
        $penerbits=Penerbit::where('user_id',Auth::id())->get();
        $tahuns=Tahun::where('user_id',Auth::id())->get();
        $gen=Genre::where('user_id',Auth::id())->get();

        return view('main.create',compact(['authors','penerbits','tahuns','gen']));
    }
    public function store(Request $request)
    {
        $this->authorize('create',Buku::class);
        $request->validate([
            'judul'=>'required|string',
            'author_id'=>'required|array',
            'author_id.*'=>'exists:authors,id',
            'penerbit_id'=>'required|exists:penerbits,id',
            'tahun_id'=>'required|exists:tahuns,id',
            'genre_id'=>'required|exists:genres,id',
            'gambar'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $gambarPath=null;
        if($request->hasFile('gambar')){
            $ext=$request->file('gambar')->getClientOriginalExtension();
            $namaFile=now()->format('YmdHis').'.'.$ext;
            $gambarPath=$request->file('gambar')->storeAs('gambar_buku',$namaFile,'public');
        }
        $bukus=Buku::create([
            'judul'=>$request->judul,
            'user_id'=>Auth::id(),
            'penerbit_id'=>$request->penerbit_id,
            'tahun_id'=>$request->tahun_id,
            'genre_id'=>$request->genre_id,
            'gambar'=>$gambarPath,
        ]);
        $bukus->authors()->attach($request->author_id);
        return redirect()->route('daftar.buku')->with('success','Berhasil input data');
    }
    public function show(string $id)
    {
        $bukus=Buku::findOrFail($id);
        $this->authorize('view',$bukus);
        return view('main.show',compact('bukus'));
    }
    public function edit(string $id)
    {
        $bukus=Buku::findOrFail($id);
        $this->authorize('update',$bukus);
        $authors=Author::where('user_id',Auth::id())->get();
        $penerbits=Penerbit::where('user_id',Auth::id())->get();
        $tahuns=Tahun::where('user_id',Auth::id())->get();
        $gen=Genre::where('user_id',Auth::id())->get();
        return view('main.edit',compact(['bukus','authors','penerbits','tahuns','gen']));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'=>'required|string',
            'author_id'=>'required|array',
            'author_id.*'=>'exists:authors,id',
            'penerbit_id'=>'required|exists:penerbits,id',
            'tahun_id'=>'required|exists:tahuns,id',
            'genre_id'=>'required|exists:genres,id',
        ]);
        $bukus=Buku::findOrFail($id);
        $this->authorize('update',$bukus);
        if($request->hasFile('gambar')){
            $ext=$request->file('gambar')->getClientOriginalExtension();
            $namaFile=now()->format('YmdHis').'.'.$ext;
            $gambarPath=$request->file('gambar')->storeAs('gambar_buku',$namaFile,'public');
            $bukus->update(['gambar'=>$gambarPath]);
        }
        $bukus->update([
            'judul'=>$request->judul,
            'penerbit_id'=>$request->penerbit_id,
            'tahun_id'=>$request->tahun_id,
            'genre_id'=>$request->genre_id,
        ]);
        $bukus->authors()->sync($request->author_id);
        return redirect()->route('daftar.buku')->with('success','Berhasil update');
    }
    public function destroy(string $id)
    {
        $bukus=Buku::findOrFail($id);
        $this->authorize('delete',$bukus);
        $bukus->delete();
        return redirect()->route('daftar.buku')->with('success',$bukus->judul.' Berhasil dihapus');
    }
    public function searchVulnerable(Request $request){
        $search=$request->search;
        $bukus=DB::select("select*from bukus where judul like '%$search%'");
        return response()->json($bukus);
    }
    public function safeSearch(Request $request){
        $search=$request->search;
        $bukus=DB::where('judul','like','%'.$search.'%')->where('user_id',Auth::id())->get();
        return response()->json($bukus);
    }
}
