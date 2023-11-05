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
                $btn = '<a href="" class="edit btn btn-warning btn-sm "><i class="fas fa-edit"></i></a>';
                $btn = $btn. '<a href="javascript:void(0)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title_category'=>'required',
        ]);

        $category=Category::create([
            'title_category'=>$request->title_category,
        ]);


    }

    public function edit(Category $category)
    {
        return view('admin.pages.category.edit-category', ['category'=>$category]);
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
