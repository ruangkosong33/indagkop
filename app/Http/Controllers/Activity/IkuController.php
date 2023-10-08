<?php

namespace App\Http\Controllers\Activity;

use App\Models\Iku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class IkuController extends Controller
{
    public function index()
    {
        $iku=Iku::latest()->get();

        return view('admin.pages.iku.index-iku', ['iku'=>$iku]);
    }

    public function create()
    {
        return view('admin.pages.iku.create-iku');
    }

    public function store(Request $request, Iku $iku)
    {
        $this->validate($request, [
            'title_iku'=>'required',
            'file_iku'=>'mimes:pdf|max:10000',
        ]);

        if($request->file('file_iku'))
        {
            $file=$request->file('file_iku');
            $extension=$file->getClientOriginalName();
            $ikus=$extension;
            $file->storeAs('uploads/file-iku', $ikus);
        }
        $iku=Iku::create($request, [
            'title_iku'=>$request->title_iku,
            'file_iku'=>$ikus,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('iku.index');
    }

    public function edit(Iku $iku)
    {
        return view('admin.pages.iku.edit-iku', ['iku'=>$iku]);
    }

    public function update(Request $request, Iku $iku)
    {
        $this->validate($request, [
            'title_iku'=>'required',
            'file_iku'=>'mimes:pdf|max:10000',
        ]);

        if($request->file('file_iku'))
        {
            $file=$request->file('file_iku');
            $extension=$file->getClientOriginalName();
            $ikus=$extension;
            $file->storeAs('uploads/file-iku', $ikus);
        }
        $iku->update($request, [
            'title_iku'=>$request->title_iku,
            'file_iku'=>$ikus,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('iku.index');
    }

    public function destroy(Iku $iku)
    {
        $iku=Iku::where('id', $iku->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('iku.index');
    }
}
