<?php

namespace App\Http\Controllers\Information;

use App\Models\Infographic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InfographicController extends Controller
{
    public function index()
    {
        $infographic=Infographic::all()->get();

        return view('admin.pages.infographic.index-infographic', ['infographic'=>$infographic]);
    }

    public function create()
    {
        return view('admin.pages.infographic.create-infographic');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_infographic'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpg,jpeg|max:10000',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-infographic', $images);
        }

        $infographic=Infographic::create([
            'title_infographic'=>$request->title_infographic,
            'description'=>$request->description,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('infographic.index');
    }

    public function edit(Infographic $infographic)
    {
        return view('admin.pages.infographic.edit-infographic', ['infographic'=>$infographic]);
    }

    public function update(Request $request, Infographic $infographic)
    {
        $this->validate($request, [
            'title_infographic'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpg,jpeg|max:10000',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-infographic', $images);
        }

        $infographic->update([
            'title_infographic'=>$request->title_infographic,
            'description'=>$request->description,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('infographic.index');
    }
}
