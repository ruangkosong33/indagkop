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
        $historical=Historical::orderBy('id')->get();

        return view('admin.pages.historical.index-historical', ['historical'=>$historical]);
    }

    public function datas()
    {
        $historical=Historical::orderBy('id')->get();

        return Datatables()->of($historical)
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
        $validator=Validator::make($request->all(), [
            'title_historical'=>'required',
            'description'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $historical=Historical::create([
            'title_historical'=>$request->title_historical,
            'description'=>$request->description,
        ]);

        return response()->json([$historical, 'message'=>'Data Berhasil Di Tambahkan']);
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
