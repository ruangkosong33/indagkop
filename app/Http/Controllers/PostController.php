<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $post=Post::orderBy('id')->get();

        $category=Category::orderBy('id')->get();

        $user=User::orderBy('id')->get();

        return view('admin.pages.post.index-post', ['post'=>$post, 'category'=>$category, 'user'=>$user]);
    }

    public function create()
    {
        $category=Category::orderBy('id')->get();

        $user=User::orderBy('id')->get();

        return view('admin.pages.post.create-post', ['category'=>$category, 'user'=>$user]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title_post'=>'required',
        //     'description'=>'required',
        //     'image'=>'mimes:jpeg,png,jpg|max:10000',
        //     'status'=>'required',
        // ]);

        // if($request->file('image'))
        // {
        //     $file=$request->file('image');
        //     $extension=$file->getClientOriginalName();
        //     $images=$extension;
        //     $file->storeAs('uploads/image-post', $images);
        // }

        // $post=Post::create([
        //     'title_post'=>$request->title_post,
        //     'description'=>$request->description,
        //     'category_id'=>$request->category_id,
        //     'image'=>$images,
        //     'user_id'=>Auth::id(),
        //     'status'=>$request->status,

        // ]);

        // Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        // return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        $category=Category::all();

        return view('admin.pages.post.edit-post', ['post'=>$post, 'category'=>$category]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title_post'=>'required',
            'description'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:10000',
            'status'=>'required',
        ]);

        if($request->file('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();
            $images=$extension;
            $file->storeAs('uploads/image-post', $images);
        }

        $post->update([
            'title_post'=>$request->title_post,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'image'=>$images,
            'user_id'=>Auth::id(),
            'status'=>$request->status,

        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post=Post::where('id', $post->id)->delete();

        Alert::success('Berhasil', 'Data Berhasil Di Simpan');

        return redirect()->route('post.index');
    }
}
