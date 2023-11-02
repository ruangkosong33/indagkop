@extends('admin.layouts.b-master')

@section('title', 'Pegawai')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Pegawai</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <a href="{{route('employee.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Bidang</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($employee as $key=>$employees)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employees->name}}</td>
                            <td>{{$employees->nip}}</td>
                            <td>{{$employees->division->title_division}}</td>
                            <td>{{$employees->image}}</td>
                            <td>
                                <a href="{{route('employee.edit', $employees->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('employee.destroy', $employees->id)}}" class="d-inline">
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
