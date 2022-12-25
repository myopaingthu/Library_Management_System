@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-book icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Books
      </div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new book</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="books-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Category</th>
          <th>Author</th>
          <th>Publisher</th>
          <th>Status</th>
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
  $(document).ready( function () {
    var table = $('#books-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('api.book') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'category', name: 'category' },
            { data: 'author', name: 'author' },
            { data: 'publisher', name: 'publisher' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on('click', '.delete-button', function(){
      var id = $(this).data('id');
      Swal.fire({
            title: 'Are you sure want to delete?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.isConfirmed) {
              $.ajax({
                   url : 'api/books/' + id,
                   type : 'DELETE',
                   success : function() {
                       table.ajax.reload();
                   }
               });
            }
        });
    });
  });
</script>
@endsection