<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.pages.banner.index-banner');
    }

    public function datas()
    {
        $banner=Banner::orderBy('id')->get();

        return Datatables()->of($banner)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                $btn = '<a href="" class="edit btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>';
                $btn = $btn. '<a href="javascript:void(0)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title_banner'=>'required',
            'image'=>'mimes:jpeg,png,jgp|max:10000',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('public/uploads/image-banner', $images);
        }
            $images='';

        $banner=Banner::create([
            'title_banner'=>$request->title_banner,
            'image'=>$images,
        ]);

        return response()->json([$banner, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.edit-banner', ['banner'=>$banner]);
    }

    public function destroy(Banner $banner)
    {
        $banner=Banner::where('id', $banner->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('banner.index');
    }
}
