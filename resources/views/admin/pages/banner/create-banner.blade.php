@extends('admin.layouts.b-master')

@section('title', 'Banner')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('banner.index')}}">Banner</a></li>
    <li class="breadcrumb-item active">Tambah Banner</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card>
                    <div class="form-group">
                        <label for="title_banner">Judul</label>
                        <input type="text" class="form-control @error('title_banner') is-invalid @enderror" name="title_banner" placeholder="Banner">

                        @error('title_banner')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control @error ('image') is-invalid @enderror">

                        @error('image')
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
