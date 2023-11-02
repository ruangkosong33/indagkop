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
                    {{-- @foreach ($post as $key=>$posts)
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
                    @endforeach --}}
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
                    <label for="categorys">Kategori</label>
                    <select name="categorys" id="category" class="form-control select2">
                        <option disabled selected>--Pilih--</option>
                        @foreach ($category as $categorys)
                        <option value={{$categorys->id}}>{{$categorys->title_category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control summernote"></textarea>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="date">Tanggal Publish</label>
                    <div class="input-group datetimepicker" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="custom-select">
                        <option disabled selected>Pilih Salah Satu</option>
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image"
                           onchange="preview('.preview-image', this.files[0])">
                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                    </div>

                    <img src="" class="img-thumbnail preview-image" style="display: none;">

                </div>
            </div>
        </div>
        
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>

    </x-modal>
    
    

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function()
        {
        $('#myTable').DataTable();
        });
    </script> --}}

@endsection

<x-toast />

@include('include.datatable')
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



