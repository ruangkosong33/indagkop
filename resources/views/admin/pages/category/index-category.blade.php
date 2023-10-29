@extends('admin.layouts.b-master')

@section('title', 'Kategori')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kategori</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($category as $key=>$categorys)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$categorys->title_category}}</td>
                            <td>
                                <a href="{{route('category.edit', $categorys->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('category.destroy', $categorys->id)}}" class="d-inline">
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

    @include('include.datatable')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function()
        {
        $('#myTable').DataTable();
        });
    </script>

@endsection

<x-toast />




