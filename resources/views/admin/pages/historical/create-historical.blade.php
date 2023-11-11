@extends('admin.layouts.b-master')

@section('title', 'Sejarah Dinas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('historical.index')}}">Sejarah Dinas</a></li>
    <li class="breadcrumb-item active">Tambah Sejarah Dinas</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('historical.store')}}" method="POST">
                @csrf
                <x-card>
                    <div class="form-group">
                        <label for="title_historical">Judul</label>
                        <input type="text" class="form-control" name="title_historical" placeholder="Sejarah Dinas">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" placeholder="Sejarah Dinas"></textarea>
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
