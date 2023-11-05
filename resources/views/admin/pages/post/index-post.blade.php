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
                    <button onclick="addForm('{{route('post.store')}}')"
                    class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </x-slot>

                <x-table>

                    <x-slot name="thead">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </x-slot>

                </x-table>
            </x-card>
        </div>
    </div>

   <!-- Form -->
    @include('admin.pages.post.form')
   <!-- End Form -->

@endsection

    <!-- VENDOR -->
    <x-toast />

    @include('include.datatable')
    @include('include.select2')
    @include('include.summernote')
    @include('include.datepicker')

    @push('script')
    <script>

        let table;

        $('.table').DataTable();

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
                    $('${modal} .modal-title').text(title);
                    $('${modal} form').attr('action', url);

                    resetForm('${modal} form');

                    loopForm(response.data);
                })
                .fail(errors => {
                    alert('Tidak Dapat Menampilkan Data');
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
                $(modal).modal('hide');
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

            $('.select2').trigger('change');
            $('.form-control, .custom-select, .custom-radio, .custom-checkbox, .select2').removeClass('is-invalid');
            $('.invalid-feedback').remove();
        }

        function loopForm(originalForm)
        {
            for (const field in originalForm)
            {
                if($('[name=${filed}]').attr('type') != 'file')
                {
                    if($('[name=${field}]').hasClass('summernote'))
                    {
                        $('[name=${field}]'.summernote('code', originalForm[field]));
                    }

                    $('[name=${field}]').val(originalForm[filed]);
                    $('select').trigger('change');
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

                $('<span class="error invalid-feedback">' + errors[error] + '</span>')
                .insertAfter($('[name="' + error + '"]'));
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
                class: 'bg-${type}',
                title: title,
                body: message
            });

            setTimeout(() => {
                $('.toats-top-right').remove();
            }, 3000);
        }
    </script>

    @endpush
    <!-- End Vendor -->



