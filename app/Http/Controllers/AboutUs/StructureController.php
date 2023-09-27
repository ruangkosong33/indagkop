<?php

namespace App\Http\Controllers\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index()
    {
        $structure=Structure::all();

        return view('admin.pages.structure.index-structure', ['structure'=>$structure]);
    }

    public function create()
    {
        return view('admin.pages.structure.create-structure');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_structure'=>'required',
            'image_structure'=>'mimes:jpg,png,jpeg|max:5000',
        ]);

        if($request->file('image_structure'))
        {
            $file=$request->file('image_structure');
            $extension=$file->getClientOriginalName();
            $image=$extension;
            $file->move('uploads/image-structure', $image);
        }

        $structure=Structure::create([
            'title_structure'=>$request->title_structure,
            'image_structure'=>$structures,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('structure.index');
    }

    public function edit(Structure $structure)
    {
        return view('admin.pages.structure.edit-structure', ['structure'=>$structure]);
    }

    public function update(Request $request, Structure $structure)
    {

    }

    public function destroy(Structure $structure)
    {
        $structure=Structure::where('id', $structure->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('structure.index');
    }
}
