<?php

namespace App\Http\Controllers;

use App\Http\Requests\KostRequest;
use App\Models\kost;
use App\Models\Sewa;
use App\Models\SewaTahunan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class KostContoller extends Controller
{
    
    public function dashboard()
    {
        $sewa = Sewa::where('status','Konfirmasi')->get();
        $sewatahunan = SewaTahunan::where('status','Konfirmasi')->get();
        return view('admin.dashboard', compact('sewa','sewatahunan'));
    }
    
    public function index()
    {
        $kost = kost::all();
        return view('admin.kost.index', compact('kost'));
    }

    public function create()
    {
        return view('admin.kost.create');
    }

    public function store(KostRequest $request)
    {
        $kost = $request->validated();

        $kost = kost::create($request->except('image'));

        if ($request->hasFile('image')) {
            $kost->addMediaFromRequest('image')->toMediaCollection('image');
        }
        
        toast('Data Ruang Kost Berhasil Ditambahkan','success');
        
        return redirect()->route('admin.kost.index');

    }

    public function edit($id)
    {
        $kost = kost::findOrFail($id);
        return view('admin.kost.edit', compact('kost'));
    }

    public function update(KostRequest $request, $id)
    {
        
        $kost = kost::findOrFail($id);


        $kost->update($request->validated());

        if ($request->hasFile('imageUrl')) {
            if ($kost->getMedia('kost')->count() > 0) {
                $kost->getMedia('kost')->first()->delete();
            }
            $kost->addMediaFromRequest('imageUrl')->toMediaCollection('kost');
        }

        toast('Data Ruang Kost Berhasil Diubah','success');

        return redirect()->route('admin.kost.index');
    }

    public function destroy($id)
    {
        $kost = kost::findOrFail($id);
        $kost->delete();

        toast('Berhasil Menghapus Data  Kost','success');

        return redirect()->route('admin.kost.index');
    }

    public function search(Request $request)
    {
        $selectedStatus = $request->input('status');

        $kost = kost::when($selectedStatus !== null , function($quary) use ($selectedStatus){
            return $quary->where('status', $selectedStatus);
        })->get();

        return view('admin.kost.index', compact('kost'));
    }

}
