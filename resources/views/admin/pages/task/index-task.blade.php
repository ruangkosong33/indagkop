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
                    @else
                    @foreach ($task as $tasks)
                        <a href="{{route('task.edit', $tasks->id)}}" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Edit</a>
                    @endforeach
                    @endif
                    
                </x-slot>

                <x-table>
                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
                    </x-slot>
                        @foreach ($task as $tasks)
                        <tr>
                            <td width="38%">Sub Judul</td>
                            <td>{{$tasks->title_task}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Deskripsi</td>
                            <td>{!!$tasks->description!!}</td>
                        </tr>
                        @endforeach
                </x-table>
            </x-card>
        </div>
    </div>

@endsection

<x-toast />
