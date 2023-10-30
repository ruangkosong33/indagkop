@extends('admin.layouts.b-master')

@section('title', 'Visi & Misi')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('vision.index')}}">Visi & Misi</a></li>
    <li class="breadcrumb-item active">Edit Visi & Misi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('vision.update', $vision->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_vision">Judul</label>
                        <input type="text" class="form-control" name="title_vision" placeholder="Visi & Misi"
                        value="{{old('title_vision') ?? $vision->title_vision}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $vision->description}}">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
