<?php

namespace App\Http\Controllers\ACtivity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SopController extends Controller
{
    public function index()
    {
        $sop=Sop::all()->latest()->get();

        return view('admin.pages.sop.index-sop', ['sop'=>$sop]);
    }

    public function create()
    {
        return view('admin.pages.sop.create-sop');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_sop'=>'required',
            'description'=>'required',
        ]);

        $sop=Sop::create([
            'title_sop'=>$request->title_sop,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil','Data Berhasil Di Simpan');

        return redirect()->route('sop.index');
    }

    public function edit(Sop $sop)
    {
        return view('admin.pages.sop.edit-sop', ['sop'=>$sop]);
    }

    public function update(Request $request, Sop $sop)
    {
        $this->validate($request, [
            'title_sop'=>'required',
            'description'=>'required',
        ]);

        $sop->update([
            'title_sop'=>$request->title_sop,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('sop.index');
    }

    public function destroy(Sop $sop)
    {
        $sop=Sop::where('id', $sop->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('sop.index');
    }
}
