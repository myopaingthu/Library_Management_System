@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="app-page-title mb-2">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-stream icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Create user</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('users.store') }}" autocomplete="off">
      @csrf
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label">Name</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="name">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">{{ __('Email Address') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-md-2 col-form-label">{{ __('Phone Number') }}</label>
        <div class="col-md-10">
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
          @error('phone')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-md-2 col-form-label">{{ __('Address') }}</label>
        <div class="col-md-10">
          <textarea class="form-control @error('address') is-invalid @enderror" style="height:60px" name="address">{{ old('address') }}</textarea>
          @error('address')
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
