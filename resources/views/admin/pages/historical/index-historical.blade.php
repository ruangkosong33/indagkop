@extends('admin.layouts.b-master')

@section('title', 'Sejarah Dinas')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Sejarah Dinas</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    @if($historical->isEmpty())
                    <button onclick="addForm({{route('historical.store')}})"
                    class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                    @endif
                </x-slot>

                <x-table id="myTable">
                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>

    <!-- Form -->
    @include('admin.pages.historical.form-historical')
    <!-- End Form -->

@endsection

    <!-- Vendor -->
    <x-toast />

    @include('include.datatable')

    @push('script')
    <script>

        $(function(){
            table= $('.table').DataTable({
                processing: true,
                autoWidth: false,
                ajax: { url: '{{route('historical.datas')}}'},
                columns:
                [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'title_historical', name: 'title_historical', sortable:false},
                    {data: 'description', name: 'description', sortable:false},
                    {data: 'action', name: 'action', sortable:false},

                ]
            });
        });

        function addForm(url, title = 'Tambah')
        {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text(title);
            $('#modal-form form').attr('action', url);

            resetForm('#modal-form form');
        }

        function editForm(url, title ='Edit')
        {
            $.get(url)
                .done(response => {
                    $(modal).modal('show');
                    $('#modal-form .modal-title').text(title);
                    $('#modal-form form').attr('action', url);

                    resetForm('#modal-form form');

                    loopForm(response.data);
                })
                .fail(errors => {
                    showAlert('Tidak Dapat Menampilkan Data');
                    return;
                });
        }

        function submitForm(originalForm)
        {
            $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
            })
            .done(response => {
                $('#modal-form').modal('hide');
                showAlert(response.message, 'success');
                table.ajax.reload();
            })
            .fail(errors => {
                if(errors.status == 422)
                {
                    loopErrors(errors.responseJSON.errors);
                    return;
                }

                showAlert(errors.responseJSON.message, 'danger');
            });
        }

        function deleteData(url)
        {
            if(confirm('Apakah Yakin Data Di Hapus?'))
            {
                $.post(url,{
                    '_method': 'delete'
                })
                .done(response => {
                    showAlert(response.message, 'success');
                    table.ajax.reload()
                })
                .fail(errors => {
                    showAlert('Tidak Dapat Menghapus Data');
                    return;
                });
            }
        }

        function resetForm(selector)
        {
            $(selector)[0].reset();

            $('#output').attr('src', '');
            $('.form-control, #output').removeClass('is-invalid');
            $('.invalid-feedback').remove();
        }

        function loopForm(originalForm)
        {
            for (const field in originalForm) {
                if ($('[name="' + field + '"]').attr('type') != 'file') {
                    if ($('[name="' + field + '"]').hasClass('summernote')) {
                        $('[name="' + field + '"]').summernote('code', originalForm[field]);
                    }

                    $('[name="' + field + '"]').val(originalForm[field]);
                    $('select').trigger('change');
                }else {
                    $(`.preview-${field}`).attr('src', originalForm[field]).show();
                }
            }
        }

        function loopErrors(errors)
        {
            $('.invalid-feedback').remove();

            if(errors == undefined)
            {
                return;
            }

            for (error in errors) {
                $('[name="' + error + '"]').addClass('is-invalid');

                if ($('[name="' + error + '"]').hasClass('select2')) {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]').next());
                } else if ($('[name="' + error + '"]').hasClass('summernote')) {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]').next());
                } else {
                    $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                        .insertAfter($('[name="' + error + '"]'));
                }
            }
        }

        function showAlert(message, type)
        {
            let title = '';
            switch(type)
            {
                case 'success':
                    title='Success';
                    break;
                case 'danger':
                    title="Failed";
                    break;
                default:
                    break;
            }
            $(document).Toasts('create',{
                class: `bg-${type}`,
                title: title,
                body: message,
            });

            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        }
    </script>

    @endpush

    <!-- End Vendor -->




