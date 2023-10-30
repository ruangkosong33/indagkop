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
            <form action="{{route('task.update', $task->id)}}" method="POST">
                @csrf
                @method('PUT')
                <x-card>
                    <div class="form-group row">
                        <label for="title_task">Judul</label>
                        <input type="text" class="form-control" name="title_task" placeholder="Tugas Pokok & Fungsi"
                        value="{{old('title_task') ?? $task->title_task}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi"
                        value="{{old('description') ?? $task->description}}">
                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>
                </x-card>
            </form>
        </div>
    </div>
@endsection
