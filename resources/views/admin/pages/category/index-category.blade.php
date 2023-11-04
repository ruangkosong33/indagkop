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
                    <button onclick="addForm('{{route('category.store')}}')"
                    class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                </x-slot>

                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>

    <!-- Form Modal -->
    @include('admin.pages.category.form-category')
    <!-- End Form Modal -->

@endsection

<x-toast />

@include('include.datatable')

@push('script')

<script>
    let table;

    $(function(){
        table= $('.table').DataTable({
            processing: true,
            autoWidth: false,
            // ajax: {
            //     url: '{{route('category.index')}}',
            // }
        });
    });

    $('#modal-form').validator().on('submit', function(e){
            if(! e.preventDefault())
            {
                $.ajax({
                    url: $('#modal-form form').attr('action'),
                    type: 'post',
                    data: $('#modal-form form').serialize()
                })
                .done((response) =>{
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                })
                .fail((errors) =>{
                    alert('Tidak Dapat Menyimpan Data');
                    return;
                })
            }
    })

    function addForm(url)
    {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        $('#modal-form form')[0].reset();

        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=title_category]').focus();
    }

    function editForm(url)
    {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit-Kategori');
    }

</script>
@endpush




