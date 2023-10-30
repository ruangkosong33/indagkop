<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Lhkpn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LhkpnController extends Controller
{
    public function index()
    {
        $lhkpn=Lhkpn::orderBy('id')->get();

        return view('admin.pages.lhkpn.index-lhkpn', ['lhkpn'=>$lhkpn]);
    }

    public function create()
    {
        return view('admin.pages.lhkpn.create-lhkpn');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_lhkpn'=>'required',
            'description'=>'required',
            'year'=>'required',
            'file'=>'mimes:pdf|max:20000',
        ]);

        if($request->file('file'))
        {
            $file=$request->file('file');
            $extension=$file->getClientOriginalName();
            $files=$extension;
            $file->storeAs('uploads/file-lhkpn', $files);
        }

        $lhkpn=Lhkpn::create([
            'title_lhkpn'=>$request->title_lhkpn,
            'description'=>$request->description,
            'year'=>$request->year,
            'file'=>$files,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('lhkpn.index');
    }

    public function edit(Lhkpn $lhkpn)
    {
        return view('admin.pages.lhkpn.edit-lhkpn', ['lhkpn'=>$lhkpn]);
    }

    public function update(Request $request, Lhkpn $lhkpn)
    {
        $this->validate($request, [
            'title_lhkpn'=>'required',
            'description'=>'required',
            'year'=>'required',
            'file'=>'mimes:pdf',
        ]);

        if($request->file('file'))
        {
            $file=$request->file('file');
            $extension=$file->getClientOriginalName();
            $files=$extension;
            $file->storeAs('uploads/file-lhkpn', $files);
        }

        $lhkpn->update([
            'title_lhkpn'=>$request->title_lhkpn,
            'description'=>$request->description,
            'year'=>$request->year,
            'file'=>$files,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('lhkpn.index');
    }
}
