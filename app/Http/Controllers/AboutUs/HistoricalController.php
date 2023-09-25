<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Historical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HistoricalController extends Controller
{
    public function index()
    {
        $historical=Historical::all();

        return view('admin.pages.historical.index-historical', ['historical'=>$historical]);
    }

    public function create()
    {
        return view('admin.pages.historical.create-historical');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_historical'=>'required',
            'description'=>'required',
        ]);

        $historical=Historical::create([
            'title_historical'=>$request->title_historical,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('historical.index');
    }

    public function edit(Historical $historical)
    {
        return view('admin.pages.historical.edit-historical', ['historical'=>$historical]);
    }

    public function update(Request $request, Historical $historical)
    {
        $this->validate($request, [
            'title_historical'=>'required',
            'description'=>'required',
        ]);

        $historical->update([
            'title_historical'=>$request->title_historical,
            'description'=>$request->description,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('historical.index');
    }

    public function destroy(Historical $historical)
    {
        $historical=Historical::where('id', $historical->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('historical.index');
    }
}
