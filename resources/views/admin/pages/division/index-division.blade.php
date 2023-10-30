@extends('admin.layouts.b-master')

@section('title', 'Bidang & UPTD')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Bidang & UPTD</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <a href="{{route('division.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Unit Kerja</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($division as $key=>$divisions)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$divisions->title_division}}</td>
                            <td>{{$divisions->description}}</td>
                            <td>
                                <a href="{{route('division.edit', $divisions->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('division.destroy', $divisions->id)}}" class="d-inline">
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
