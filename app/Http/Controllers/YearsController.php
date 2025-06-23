<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Tahun::query();
        if($request->has('search') && $request->search != ''){
            $query->where('tahun','like','%'.$request->search.'%');
        }
        $years=$query->paginate(10);
        return view('years.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun'=>'required',
        ]);
        $years=Tahun::create($request->all());
        return redirect()->route('create.years')->with('success','Berhasil menambah tahun rilis');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $years=Tahun::findOrFail($id);
        return view('years.show',compact('years'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $years=Tahun::findOrFail($id);
        return view('years.edit',compact('years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun'=>'required',
        ]);
        $years=Tahun::findOrFail($id);
        $years->update($request->all());
        return redirect()->route('daftar.years')->with('success','Berhasil mengubah tahun rilis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $years=Tahun::findOrFail($id);
        $years->delete();
        return redirect()->route('daftar.years')->with('success','Berhasil menghapus');
    }
}
