<?php

namespace App\Http\Controllers\Organization;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    public function index()
    {
        $division=Division::orderBy('id')->get();

        return view('admin.pages.division.index-division', ['division'=>$division]);
    }

    public function create()
    {
        return view('admin.pages.division.create-division');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_division'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:5000'
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('/uploads/image-division', $images);
        }

        $division=Division::create([
            'title_division'=>$request->title_division,
            'description'=>$request->description,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('division.index');
    }

    public function edit(Division $division)
    {
        return view('admin.pages.division.edit-division', ['division'=>$division]);
    }

    public function Update(Request $request, Division $division)
    {
        $this->validate($request, [
            'title_division'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:5000'
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-division', $images);
        }else{
            unset($division['image']);
        }

        $division->update([
            'title_division'=>$request->title_division,
            'description'=>$request->description,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('division.index');
    }

    public function destroy(Division $division)
    {
        $division=Division::where('id', $division->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('division.index');
    }

}
