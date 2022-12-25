@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-book icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Edit Issue Books
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('issue-books.update', [$result['book_issue']->id]) }}" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Book Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" value="{{ $result['book_issue']->book->name }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Fine</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" value="{{ $result['fine'] }} MMK" readonly>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="#" class="btn btn-secondary back-btn">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Mark Book as Returned
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
