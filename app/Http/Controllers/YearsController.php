<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class YearsController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        $this->authorize('viewAny',Tahun::class);
        $query=Tahun::query()->where('user_id',Auth::id());
        if($request->has('search') && $request->search != ''){
            $query->where('tahun','like','%'.$request->search.'%');
        }
        $years=$query->paginate(10);
        return view('years.index',compact('years'));
    }
    public function create()
    {
        $this->authorize('create',Tahun::class);
        return view('years.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tahun'=>'required',
        ]);
        $years=Tahun::create([
            'tahun'=>$request->tahun,
            'user_id'=>Auth::id(),
        ]);
        $this->authorize($years,Tahun::class);
        return redirect()->route('create.years')->with('success','Berhasil menambah tahun rilis');
    }
    public function show(string $id)
    {
        $years=Tahun::findOrFail($id);
        $this->authorize($years,Tahun::class);
        return view('years.show',compact('years'));
    }
    public function edit(string $id)
    {
        $years=Tahun::findOrFail($id);
        $this->authorize($years,Tahun::class);
        return view('years.edit',compact('years'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun'=>'required',
        ]);
        $years=Tahun::findOrFail($id);
        $this->authorize($years,Tahun::class);
        $years->update($request->all());
        return redirect()->route('daftar.years')->with('success','Berhasil mengubah tahun rilis');
    }
    public function destroy(string $id)
    {
        $years=Tahun::findOrFail($id);
        $this->authorize($years,Tahun::class);
        $years->delete();
        return redirect()->route('daftar.years')->with('success','Berhasil menghapus');
    }
}
