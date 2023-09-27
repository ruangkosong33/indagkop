<?php

namespace App\Http\Controllers\AboutUs;

use App\Models\Quality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QualityController extends Controller
{
    public function index()
    {
        $quality=Quality::all();

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


    }
}
