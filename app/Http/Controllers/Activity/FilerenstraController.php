<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileRenstraController extends Controller
{
    public function index(Renstra $renstra)
    {
        $filerenstra=Filerenstra::where('renstra_id', $renstra->id)->latest()->get();

        return view('admin.pages.filerenstra.index-filerenstra', ['filerenstra'=>$filerenstra, 'renstra'=>$renstra]);
    }

    public function create(Renstra $renstra)
    {
        return view('admin.pages.renstra.create-renstra', ['renstra'=>$renstra]);
    }

    public function store(Request $request, Renstra $renstra)
    {
        $this->validate($request, [
            'title_file'=>'required',
            'file'=>'mimes:pdf|max:10000',
        ]);

        if($request->file('file'))
        {
            $file=$request->file('file');
            $extension=$file->getClientOriginalName();
            $files=$extension;
            $file->storeAs('uploads/file-renstra', $files);
        }

        $filerenstra=Filerenstra::create([
            'title_file'=>$request->title_file,
            'file'=>$files,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return view('admin.pages.fileresntra.index-filerenstra',['renstra'=>$renstra]);
    }

    public function edit(Filerenstra $filerenstra)
    {
        return view('admin.pages.filerenstra.edit-filerenstra', ['filerenstra'=>$filerenstra]);
    }

    public function update(Request $request, Filerenstra $filerenstra)
    {

    }
}
