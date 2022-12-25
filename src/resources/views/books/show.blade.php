@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-book icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Books Detail</div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->name }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Category</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->category->name }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Author</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->author->name }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Publisher</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->publisher->name }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Status</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ \App\Enums\BookStatus::getLabel($book->status) }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Created At</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->created_at }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Updated At</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $book->updated_at }}" readonly>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <a href="#" class="btn btn-secondary back-btn">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
