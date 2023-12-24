@extends('admin.layout.app')
@section('page_title','Survey Question')
@section('content')
<!-- users list start -->
<section class="app-user-list">
    
    <!-- list section start -->
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
          <h4 class="card-title">Survey Question</h4>
          <!-- <a href="{{ route('question.create') }}"><button type="reset" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Add New Question</button></a> -->
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="question-list-table table">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>Question</th>
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
<!-- <script src="{{ asset('app-assets/js/scripts/pages/app-user-list.js') }}"></script> -->
<script type="text/javascript">
    $(function() {
        var table = $('.question-list-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: "{{ route('question.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'question',
                    name: 'question',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
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
        });

    });
</script>
@endsection