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
      <div>Issue Books
      </div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{ route('issue-books.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new issue book</a>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="books-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>User Name</th>
          <th>Book Name</th>
          <th>User Email</th>
          <th>User Phone</th>
          <th>User Address</th>
          <th>Issue Date</th>
          <th>Return Date</th>
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
        ajax: '{!! route('api.issue-books') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user_name', name: 'user_name' },
            { data: 'book_name', name: 'book_name' },
            { data: 'user_email', name: 'user_email' },
            { data: 'user_phone', name: 'user_phone' },
            { data: 'user_address', name: 'user_address' },
            { data: 'issue_date', name: 'issue_date' },
            { data: 'return_date', name: 'return_date' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endsection
