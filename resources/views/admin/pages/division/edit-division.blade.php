@extends('admin.layouts.b-master')

@section('title', 'Bidang & UPTD')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('division.index')}}">Bidang & UPTD</a></li>
    <li class="breadcrumb-item active">Edit Bidang & UPTD</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('division.update', $division->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group">
                        <label for="title_division">Unit Kerja</label>
                        <input type="text" class="form-control" name="title_division" placeholder="Bidang / UPTD"
                        value="{{old('title_division') ?? $division->title_division}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $division->description}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" name="image">
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
