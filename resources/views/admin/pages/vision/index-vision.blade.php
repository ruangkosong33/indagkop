<script type="text/javascript">
    $(document).ready(function()
    {
       $('#myTable').DataTable({
            processing :true,
            serverside : true,
            ajax : "{{route('test.index')}}",
            columns:
            [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category'},
                {data: 'action', name: 'action', orderable: false},

            ]
       });
    });

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '#btn-tambah', function(e)
    {
        e.preventDefault();
        $('#modal-default').modal('show');
        $('.simpan').click(function()
        {
            $.ajax(
                {
                    url:"{{route('test.store')}}",
                    type:'POST',
                    data:
                    {
                        "_token":"{{csrf_token()}}",
                        name : $('#name').val(),
                        category : $('#category').val(),
                    },
                    success:function(response)
                    {
                        console.log(response);
                        $('#myTable').DataTable().ajax.reload();
                    }
                }
            );
        });
    });
