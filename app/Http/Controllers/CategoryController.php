<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::orderBy('title_category')->get();

        return view('admin.pages.category.index-category', ['category'=>$category]);
    }

    public function create()
    {
        return view('admin.pages.category.create-category');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_category'=>'required',
        ]);

        $category=Category::create([
            'title_category'=>$request->title_category,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('category.index')->with(['message'=>'Kategori Berhasil Di Tambahkan', 'success'=>true]);
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

        Alert::success('Berhasil', 'Data Berhasil Di Update');

        return redirect()->route('category.index')->with(['message'=>'Kategori Berhasil Di Update', 'success'=>true]);
    }

    public function destroy(Category $category)
    {
        $category=Category::where('id', $category->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Hapus');

        return redirect()->route('category.index')->with(['message'=>'Kategori Berhasil Di Hapus', 'success'=>true]);
    }

}
