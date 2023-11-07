<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $category=Category::orderBy('id')->get();

        return view('admin.pages.post.index-post', ['category'=>$category]);
    }

    public function datas()
    {
        $post=Post::orderBy('date')->get();

        return Datatables()->of($post)
            ->addIndexColumn()
            ->addColumn('user', function($user)
            {
                return $user->user->name;
            })
            ->addColumn('category', function($category)
            {
                return $category->category->title_category;
            })
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
            'title_post'=>'required',
            'image'=>'mimes:jpeg,png,jgp|max:10000',
            'date'=>'required|date_format:Y-m-d H:i',
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
            $file->storeAs('public/uploads/images-post', $images);
        }else{
            $images="";
        }

        $post=Post::create([
            'title_post'=>$request->title_post,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$images,
            'date'=>$request->date,
            'user_id'=>Auth::id(),
        ]);

        return response()->json([$post, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    public function show(Post $post)
    {
        $post->date=date('Y-m-d H:i', strtotime($post->date));

        return response()->json(['data'=>$post]);
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
