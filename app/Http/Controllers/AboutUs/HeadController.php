<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Headoffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HeadController extends Controller
{
    public function index()
    {
        $headoffice=Headoffice::all();

        return view('admin.pages.headoffice.index-headoffice', ['headoffice'=>$headoffice]);
    }

    public function create()
    {
        return view('admin.pages.headoffice.create-headoffice');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_head'=>'required',
            'image_head'=>'mimes:png,jpg|max:5000',
            'position'=>'required',
            'periode'=>'required',
        ]);

        if($request->file('image_head'))
        {
            $file=$request->file('image_head');
            $extension=$file->getClientOriginalName();
            $imageheads=$extension;
            $file->move('uploads/image-head', $imageheads);
        }

        $headoffice=Headoffice::create([
            'name_head'=>$request->name_head,
            'image_head'=>$imageheads,
            'position'=>$request->position,
            'periode'=>$request->periode,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('head.index');
    }

    public function edit(Headoffice $headoffice)
    {
        return view('admin.pages.head.edit-head', ['headoffice'=>$headoffice]);
    }

    public function update(Request $request, Headoffice $headoffice)
    {
        $this->validate($request, [
            'name_head'=>'required',
            'image_head'=>'mimes:png,jpg|max:5000',
            'position'=>'required',
            'periode'=>'required',
        ]);

        $headoffice->update([
            'name_head'=>$request->name_head,
            'image_head'=>$imageheads,
            'position'=>$request->position,
            'periode'=>$request->periode,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('head.index');
    }

    public function destroy(Headoffice $headoffice)
    {
        $headoffice=Headoffice::where('id', $headoffice->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('head.index');
    }
}
