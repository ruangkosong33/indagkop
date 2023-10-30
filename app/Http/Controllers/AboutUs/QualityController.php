<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Quality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class QualityController extends Controller
{
    public function index()
    {
        $quality=Quality::orderBy('id')->get();

        return view('admin.pages.quality.index-quality', ['quality'=>$quality]);
    }

    public function create()
    {
        return view('admin.pages.quality.create-quality');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_quality'=>'required',
            'description'=>'required',
        ]);

        $quality=Quality::create([
            'title_quality'=>$request->title_quality,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('quality.index');
    }

    public function edit(Quality $quality)
    {
        return view('admin.pages.quality.edit-quality', ['quality'=>$quality]);
    }

    public function update(Request $request, Quality $quality)
    {
        $this->validate($request, [
            'title_quality'=>'required',
            'description'=>'required',
        ]);

        $quality->update([
            'title_quality'=>$request->title_quality,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('quality.index');
    }

    public function destroy(Quality $quality)
    {
        $quality=Quality::where('id', $quality->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('quality.index');
    }
}

