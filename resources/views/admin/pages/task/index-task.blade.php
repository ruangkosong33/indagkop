@extends('admin.layouts.b-master')

@section('title', 'Tugas Pokok & Fungsi')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Tugas Pokok & Fungsi</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    @if($task->isEmpty())
                    <a href="{{route('task.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                    @endif
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($task as $tasks)
                        <tr>
                            <td>{{$tasks->title_task}}</td>
                            <td>{{$tasks->description}}</td>
                            <td>
                                <a href="{{route('task.edit', $tasks->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('task.destroy', $tasks->id)}}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger btn-delete" onclick="return confirm('Yakin Ingin Menghapus Data?')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </x-card>
        </div>
    </div>

@endsection

<x-toast />
