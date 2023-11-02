@extends('admin.layouts.b-master')

@section('title', 'Kategori')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Kategori</a></li>
    <li class="breadcrumb-item active">Tambah Kategori</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <x-card>
                    <div class="form-group row">
                        <label for="title_category">Kategori</label>
                        <input type="text" class="form-control @error('title_category') is-invalid @enderror" name="title_category" placeholder="Nama Kategori">
                        
                        @error('title_category')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

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
