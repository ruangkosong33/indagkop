@extends('admin.layouts.b-master')

@section('title', 'Kebijakan Mutu')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('quality.index')}}">Kebijakan Mutu</a></li>
    <li class="breadcrumb-item active">Edit Kebijakan Mutu</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('quality.update', $quality->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_quality">Judul</label>
                        <input type="text" class="form-control" name="title_quality" placeholder="Kebijakan Mutu"
                        value="{{old('title_quality') ?? $quality->title_quality}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $quality->description}}">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
