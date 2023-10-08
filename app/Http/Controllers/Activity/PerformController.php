<?php

namespace App\Http\Controllers\Activity;

use App\Models\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerformController extends Controller
{
    public function index()
    {
        $perform=Perform::latest()->get();

        return view('admin.pages.perform.index-perform', ['perform'=>$perform]);
    }

    public function create()
    {
        return view('admin.pages.perform.create-perform');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_perform'=>'required',
            'file'=>'mimes:pdf|max:10000',
        ]);

        if($request->file('file'))
        {
            $file->$request->file('file');
            $extension=$file->getClientOriginalName();
            $files=$extension;
            $file->storeAs('uploads/file-perform', $files);
        }

        $perform=Perform::create([
            'title_perform'=>$request->title_perform,
            'file'=>$files,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('perform.index');
    }

    public function edit(Perform $perform)
    {
        return view('admin.pages.perform.edit-perform', ['perform'=>$perform]);
    }
}
