<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner=Banner::all();

        return view('admin.pages.banner.index-banner', ['banner'=>$banner]);
    }

    public function create()
    {
        return view('admin.pages.banner.create-banner');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_banner'=>'required',
            'image'=>'mimes:jpg,png,jpeg|max:5000',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-banner', $images);
        }

        $banner=Banner::create([
            'title_banner'=>$request->title_banner,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di SImpan');

        return redirect()->route('banner.index');
    }

    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.edit-banner', ['banner'=>$banner]);
    }

    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'title_banner'=>'required',
            'image'=>'mimes:jpg,png,jpeg|max:5000',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-banner', $images);
        }

        $banner->update([
            'title_banner'=>$request->title_banner,
            'image'=>$images,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('banner.index');
    }

    public function destroy(Banner $banner)
    {
        $banner=Banner::where('id', $banner->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('banner.index');
    }
}
