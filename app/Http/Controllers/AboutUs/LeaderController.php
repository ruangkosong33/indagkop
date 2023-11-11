<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Leader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderController extends Controller
{
    public function index()
    {
        $leader=Leader::orderBy('id')->get();

        return view('admin.pages.leader.index-leader', ['leader'=>$leader]);
    }

    public function create()
    {
        return view('admin.pages.leader.create-leader');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image_leader'=>'mimes:png,jpg,jpeg|max:5000',
            'position'=>'required',
            'periode'=>'required'
        ]);

        if($request->file('image_head'))
        {
            $file=$request->file('image_head');
            $extension=$file->getClientOriginalName();
            $imageleader=$extension;
            $file->storeAs('public/uploads/image-leader', $imageleader);
        }

        $leader=Leader::create([
            'name'=>$request->name,
            'image_leader'=>$imageleader,
            'position'=>$request->position,
            'periode'=>$request->periode,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('leader.index');
    }

    public function edit(Leader $leader)
    {
        return view('admin.pages.leader.edit-leader', ['leader'=>$leader]);
    }

    public function update(Request $request, Leader $leader)
    {
        $this->validate($request, [
            'name'=>'required',
            'image_leader'=>'mimes:png,jpg,jpeg',
            'position'=>'required',
            'periode'=>'required',
        ]);

        if($request->file('image_head'))
        {
            $file=$request->file('image_head');
            $extension=$file->getClientOriginalName();
            $imageleader=$extension;
            $file->storeAs('uploads/image-leader', $imageleader);
        }

        $leader->update([
            'name'=>$request->name,
            'image_leader'=>$imageleader,
            'position'=>$request->position,
            'periode'=>$request->position,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('leader.index');
    }

    public function destroy(Leader $leader)
    {
        $leader=Leader::where('id', $leader->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('leader.index');
    }
}
