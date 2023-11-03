@extends('admin.layouts.b-master')

@section('title', 'Berita')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Berita</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addForm('{{route('post.store')}}')" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </x-slot>
                    @foreach ($post as $key=>$posts)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$posts->title_post}}</td>
                            <td>{{$posts->category->title_category}}</td>
                            <td>{{$posts->image}}</td>
                            <td>{{$posts->status}}</td>
                            <td>
                                <a href="{{route('post.edit', $posts->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="post" action="{{route('post.destroy', $posts->id)}}" class="d-inline">
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

   <!-- Form -->
    @include('admin.pages.post.form-post')
   <!-- End Form -->
    
    @include('include.datatable')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function()
        {
        $('#myTable').DataTable();
        });
    </script>

@endsection

<x-toast />

@include('include.select2')
@include('include.summernote')
@include('include.datepicker')

@push('script')
<script>
    function addForm(url)
    {
        $('#modal-form').modal('show');
    }
</script>

@endpush



