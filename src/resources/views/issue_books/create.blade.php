@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="app-page-title mb-2">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-book icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Create Issue Books</div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('issue-books.store') }}" autocomplete="off">
            @csrf
            <div class="form-group row">
                <label for="user" class="col-md-2 col-form-label">User</label>
                <div class="col-md-10">
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                        @foreach ($users as $user)
                            @if ($user->id == old('user_id'))
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-md-2 col-form-label">Book</label>
                <div class="col-md-10">
                    <select class="form-control @error('book_id') is-invalid @enderror" name="book_id">
                        @foreach ($books as $book)
                            @if ($book->id == old('book_id'))
                                <option value="{{ $book->id }}" selected>{{ $book->name }}</option>
                            @else
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('book_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="javascript:void(0)" class="btn btn-secondary back-btn">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
