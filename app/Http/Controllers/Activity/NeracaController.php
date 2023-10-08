<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    public function index()
    {
        $neraca=Neraca::latest()->get();

        return view('admin.pages.neraca.index-neraca', ['neraca'=>$neraca]);
    }

    public function create()
    {
        return view('admin.pages.neraca.create-neraca');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_neraca'=>'required',
            'description'=>'required',
        ]);

        $neraca=Neraca::create([
            'title_neraca'=>$request->title_neraca,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('neraca.index');
    }

    public function edit(Neraca $neraca)
    {
        return view('admin.pages.neraca.edit-neraca', ['neraca'=>$neraca]);
    }

    public function update(Request $request, Neraca $neraca)
    {
        $this->validate($request, [
            'title_neraca'=>'required',
            'description'=>'required',
        ]);

        $neraca->update([
            'title_neraca'=>$request->title_neraca,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('neraca.index');
    }

    public function destroy(Neraca $neraca)
    {
        $neraca=Neraca::where('id', $neraca->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->back();
    }

}

