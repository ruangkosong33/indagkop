@extends('admin.layouts.b-master')

@section('title', 'Tugas Pokok & Fungsi')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('task.index')}}">Visi & Misi</a></li>
    <li class="breadcrumb-item active">Tambah Tugas Pokok & Fungsi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('task.store')}}" method="POST">
                @csrf
                <x-card>
                    <div class="form-group">
                        <label for="title_task">Judul</label>
                        <input type="text" class="form-control" name="title_task" placeholder="Tugas Pokok & Fungsi">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
