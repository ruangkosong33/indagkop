<?php

namespace App\Http\Controllers\Information;

use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CommodityController extends Controller
{
    public function index()
    {
        $commodity=Commodity::all()->get();

        return view('admin.pages.commodity.index-commodity', ['commodity'=>$commodity]);
    }

    public function create()
    {
        return view('admin.pages.commodity.create-commodity');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'item'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:10000',
            'description'=>'required',
            'price'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAS('uploads/image-commodity', $images);
        };

        $commodity=Commodity::create([
            'item'=>$request->item,
            'images'=>$images,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('commodity.index');
    }

    public function edit(Commodity $commodity)
    {
        return view('admin.pages.commodity.edit-commodity', ['commodity'=>$commodity]);
    }

    public function update(Request $request, Commodity $commodity)
    {
        $this->validate($request, [
            'item'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:10000',
            'description'=>'required',
            'price'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAS('uploads/image-commodity', $images);
        };

        $commodity->update([
            'item'=>$request->item,
            'images'=>$images,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('commodity.index');
    }

    public function destroy(Commodity $commodity)
    {
        $commodity=Commodity::where('id', $commodity->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('commodity.index');
    }
}
