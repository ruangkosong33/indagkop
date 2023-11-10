<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.category.index-category');
    }

    public function datas()
    {
        $category=Category::orderBy('id')->get();

        return Datatables()->of($category)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <button onclick="editForm(`'.route('category.edit', $row->id).'`)"  class="edit btn btn-warning btn-sm "><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('category.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title_category'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $category=Category::create([
            'title_category'=>$request->title_category,
        ]);

        return response()->json([$category, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    public function edit(Category $category)
    {
        $category;
    }

    public function update(Request $request,  Category $category)
    {
        $this->validate($request, [
            'title_category'=>'required',
        ]);

        $category->update([
            'title_category'=>$request->title_category,
        ]);

        // Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('category.index')->with(['message'=>'Kategori Berhasil Di Update', 'success'=>true]);
    }

    public function destroy(Category $category)
    {
        $category=Category::where('id', $category->id)->delete();

        // Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('category.index')->with(['message'=>'Kategori Berhasil Di Hapus', 'success'=>true]);
    }

}
