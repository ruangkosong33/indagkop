@extends('admin.layouts.b-master')

@section('title', 'Kebijakan Mutu')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kebijakan Mutu</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    @if($quality->isEmpty())
                    <a href="{{route('quality.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                    @endif
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($quality as $qualitys)
                        <tr>
                            <td>{{$qualitys->title_quality}}</td>
                            <td>{{$qualitys->description}}</td>
                            <td>
                                <a href="{{route('quality.edit', $qualitys->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('quality.destroy', $qualitys->id)}}" class="d-inline">
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
