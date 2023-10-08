<?php

namespace App\Http\Controllers\Activity;

use App\Models\Renstra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RenstraController extends Controller
{
    public function index()
    {
        $renstra=Renstra::latest()->get();

        return view('admin.pages.renstra.index-renstra', ['renstra'=>$renstra]);
    }

    public function create()
    {
        return view('admin.pages.renstra.create-renstra');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_renstra'=>'required',
            'tahun'=>'required',
        ]);

        $renstra=Renstra::create([
            'title_renstra'=>$request->title_renstra,
            'year'=>$request->year,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('renstra.index');
    }

    public function edit(Renstra $renstra)
    {
        return view('admin.pages.renstra.edit-renstra', ['renstra'=>$renstra]);
    }

    public function update(Request $request, Renstra $renstra)
    {
        $this->validate($request, [
            'title_renstra'=>'required',
            'year'=>'required',
        ]);

        $renstra=Renstra::create([
            'title_renstra'=>$request->title_renstra,
            'year'=>$request->year,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('renstra.index');
    }

    public function destroy(Renstra $renstra)
    {
        $renstra=Renstra::where('id', $renstra->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('renstra.index');
    }
}
