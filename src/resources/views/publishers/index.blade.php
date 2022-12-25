@extends('layouts.app')

@section('title', 'Publishers')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-stream icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Publishers
      </div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{ route('publishers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new publisher</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="publishers-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function() {
    var table = $('#publishers-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('api.publisher') !!}',
      columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'created_at', name: 'created_at' },
        { data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });

    $(document).on('click', '.delete-button', function() {
      var id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure want to delete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function(result) {
        if (result.isConfirmed) {
          $.ajax({
            url: 'api/publishers/' + id,
            type: 'DELETE',
            success: function() {
              table.ajax.reload();
            }
          });
        }
      });
    });
  });
</script>
@endsection
