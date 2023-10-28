@extends('admin.layouts.b-master')

@section('title', 'Kategori')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Kategori</a></li>
    <li class="breadcrumb-item active">Edit Kategori</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_category">Kategori</label>
                        <input type="text" class="form-control" name="title_category" placeholder="Nama Kategori" 
                        value="{{old('title_category') ?? $category->title_category}}">
                    </div>
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
