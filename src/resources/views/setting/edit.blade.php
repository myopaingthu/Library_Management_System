@extends('layouts.app')

@section('title', 'Setting Edit')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Edit Setting</div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('setting.update', [$setting->id]) }}" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{$setting->id}}">
      <div class="form-group row">
        <label for="return_days" class="col-md-2 col-form-label">{{ __('Return Days') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('return_days') is-invalid @enderror" name="return_days" value="{{$setting->return_days}}" id="return_days">
          @error('return_days')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="fine" class="col-md-2 col-form-label">{{ __('Fine Amount') }}</label>
        <div class="col-md-10">
          <input type="text" class="form-control @error('fine') is-invalid @enderror" name="fine" value="{{$setting->fine}}">
          @error('fine')
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
