@extends('admin.layout.app')
@section('page_title','Genre')
@section('content')
<!-- users list start -->
<section class="app-user-list">
    <!-- users filter end -->
    <!-- list section start -->
    <div class="card">

        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
          <h4 class="card-title">Genres</h4>
          <a href="{{ route('genres.create') }}"><button type="reset" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Add New Genre</button></a>
        </div>
        <div class="card-datatable pt-0 table-responsive">
            <table class="user-list-table datatables-ajax table">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Genre Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <!-- list section end -->
</section>
<!-- users list ends -->
@endsection

@section('extra-script')
<script src="{{ asset('app-assets/js/scripts/pages/app-user-list.js') }}"></script>
<script type="text/javascript">
    $(function() {
        var table = $('.user-list-table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            order: [[1, 'desc']],
            ajax: "{{ route('genres.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'id',
                    visible: false,
                },
                {
                    data: 'genre_name',
                    name: 'genre_name'

                },
                {
                    data: 'image',
                    name: 'image',
                    searchable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                Survey.Utils.dtAnchorToForm(row);
            }
        }).on('click', '.delete_action', function(e) {
            e.preventDefault();
            var $this = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $this.find("form").trigger('submit');
                }
            });
        }).on('click', '.status_update', function(e){
            e.preventDefault();
                var $this   = $(this),
                userId  = $this.data('user_id'),
                status  = $this.data('status'),
                message = status == 1 ? 'Are you sure you want to deactivate genre?' : 'Are you sure you want to activate genre?';

            console.log('User ID: ', userId);
            console.log('Status to be updated: ', status);
            console.log(message);

            Swal.fire({
                title: 'Update user status',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type:'POST',
                    url:"{{route('change-genre-status')}}",
                    dataType:'json',
                    data:{user_id:userId, status: status},
                    success:function(data){
                        if(data.status)
                        {
                            table.ajax.reload();
                        }
                    }

                    });
                }
            });

            return false;
        });
    });
</script>
@endsection