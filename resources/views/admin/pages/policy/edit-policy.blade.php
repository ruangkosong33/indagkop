@extends('admin.layouts.b-master')

@section('title', 'Peraturan & Kebijakan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('policy.index')}}">Peraturan & Kebijakan</a></li>
    <li class="breadcrumb-item active">Edit Peraturan & Kebijakan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('policy.store')}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_policy">Judul</label>
                        <input type="text" class="form-control" name="title_policy" placeholder="Peraturan & Kebijakan"
                        value="{{old('title_policy') ?? $policy->title_policy}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $policy->description}}">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
