@extends('admin.layouts.b-master')

@section('title', 'Banner')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Banner</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <a href="{{route('banner.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($banner as $key=>$banners)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$banners->title_banner}}</td>
                            <td>{{$banners->image}}</td>
                            <td>
                                <form method="post" action="{{route('banner.destroy', $banners->id)}}" class="d-inline">
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

    @include('include.datatable')

    @push('script')

    <script>
        let table;
        
        $('.table').DataTable();

    </script>

    @endpush


