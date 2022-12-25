@extends('layouts.app')

@section('title', 'User Edit')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Edit User</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('users.update', [$user->id]) }}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{$user->id}}">
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Name</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" id="name">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">{{ __('Email Address') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}</label>
        <div class="col-md-10">
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-md-2 col-form-label">{{ __('Address') }}</label>
        <div class="col-md-10">
          <textarea class="form-control @error('address') is-invalid @enderror" style="height:60px" name="address">{{ $user->address }}</textarea>
          @error('address')
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
