@extends('admin.layouts.b-master')

@section('title', 'Sejarah Dinas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('historical.index')}}">Sejarah Dinas</a></li>
    <li class="breadcrumb-item active">Edit Sejarah Dinas</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('historical.update', $historical->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_historical">Judul</label>
                        <input type="text" class="form-control" name="title_historical" placeholder="Sejarah Dinas"
                        value="{{old('title_historical') ?? $historical->title_historical}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $historical->description}}">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
