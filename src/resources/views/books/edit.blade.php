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
            <div>Edit Book
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('books.update', [$book->id]) }}" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $book->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Category</label>
                <div class="col-md-10">
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            @if ($category->id == old('category_id'))
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @elseif ($category->id == $book->category_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="author" class="col-md-2 col-form-label">Author</label>
                <div class="col-md-10">
                    <select class="form-control" name="author_id">
                        @foreach ($authors as $author)
                            @if ($author->id == old('author_id'))
                                <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                            @elseif ($author->id == $book->author_id)
                                <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                            @else
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('author_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="publisher" class="col-md-2 col-form-label">Publisher</label>
                <div class="col-md-10">
                    <select class="form-control" name="publisher_id">
                        @foreach ($publishers as $publisher)
                            @if ($publisher->id == old('publisher_id'))
                                <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                            @elseif ($publisher->id == $book->publisher_id)
                                <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                            @else
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('publisher_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <a href="#" class="btn btn-secondary back-btn">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
