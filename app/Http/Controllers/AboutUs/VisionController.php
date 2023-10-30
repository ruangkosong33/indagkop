<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Vision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VisionController extends Controller
{
    public function index()
    {
        $vision=Vision::orderBy('id')->get();

        return view('admin.pages.vision.index-vision', ['vision'=>$vision]);
    }

    public function create()
    {
        return view('admin.pages.vision.create-vision');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_vision'=>'required',
            'description'=>'required',
        ]);

        $vision=Vision::create([
            'title_vision'=>$request->title_vision,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('vision.index');
    }

    public function edit(Vision $vision)
    {
        return view('admin.pages.vision.edit-vision', ['vision'=>$vision]);
    }

    public function update(Request $request, Vision $vision)
    {
        $this->validate($request, [
            'title_vision'=>'required',
            'description'=>'required',
        ]);

        $vision->update([
            'title_vision'=>$request->title_vision,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('vision.index');
    }

    public function destroy(Vision $vision)
    {
        $vision=Vision::where('id', $vision->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('vision.index');
    }
}
