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

    <x-modal>
        <x-slot name="title">
            Tambah
        </x-slot>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title_post">Judul</label>
                    <input type="text" name="title_post" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title_category">Kategori</label>
                    <select name="title_category" id="category" class="form-control"></select>
                </div>
            </div>

        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-modal>

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

@push('script')
<script>
    function addForm(url)
    {
        $('.modal').modal('show');
    }
</script>

@endpush



