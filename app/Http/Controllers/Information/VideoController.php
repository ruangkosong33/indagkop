<?php

namespace App\Http\Controllers\Information;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    public function index()
    {
        $video=Video::all();

        return view('admin.pages.video.index-video', ['video'=>$video]);
    }

    public function create()
    {
        return view('admin.pages.video.create-video');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_video'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:2000',
            'link'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-video', $images);
        }

        $video=Video::create([
            'title_video'=>$request->title_video,
            'description'=>$request->description,
            'image'=>$images,
            'link'=>$request->link,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('video.index');
    }

    public function edit(Video $video)
    {
        return view('admin.pages.video-edit-video', ['video'=>$video]);
    }

    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'title_video'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:2000',
            'link'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-video', $images);
        }

        $images=$images->image;

        $video->update([
            'title_video'=>$request->title_video,
            'description'=>$request->description,
            'image'=>$images,
            'link'=>$request->link,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('video.index');
    }

    public function destroy(Video $video)
    {
        $video=Video::where('id', $video->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('video.index');
    }
}
