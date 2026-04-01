<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
         $this->authorize('viewAny',Penerbit::class);
        $query=Penerbit::query()->where('user_id',Auth::id());
        if($request->has('search') && $request->search !=''){
            $query->where('namaPenerbit','like','%'.$request->search.'%');
        }
        $publishers=$query->paginate(5);
        return view('publisher.index',compact('publishers'));
    }
    public function create()
    {
        $this->authorize('create',Penerbit::class);
        return view('publisher.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'namaPenerbit'=>'required',
            'alamat'=>'required',
        ]);
        $publishers=Penerbit::create([
            'namaPenerbit'=>$request->namaPenerbit,
            'alamat'=>$request->alamat,
            'user_id'=>Auth::id()
        ]);
        $this->authorize($publishers,Penerbit::class);
        return redirect()->route('create.penerbit')->with('success','Berhasil menambah daftar penerbit');
    }
    public function show(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        $this->authorize($publishers,Penerbit::class);
        return view('publisher.show',compact('publishers'));
    }
    public function edit(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        $this->authorize($publishers,Penerbit::class);
        return view('publisher.edit',compact('publishers'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namaPenerbit'=>'required',
            'alamat'=>'required',
        ]);
        $publishers=Penerbit::findOrFail($id);
        $this->authorize($publishers,Penerbit::class);
        $publishers->update($request->all());
        return redirect()->route('daftar.penerbit')->with('success','Berhasil update');
    }
    public function destroy(string $id)
    {
        $publishers=Penerbit::findOrFail($id);
        $this->authorize($publishers,Penerbit::class);
        $publishers->delete();
        return redirect()->route('daftar.penerbit')->with('success','Berhasil menghapus');
    }
}
