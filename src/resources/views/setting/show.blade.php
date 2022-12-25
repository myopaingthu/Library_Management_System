@extends('layouts.app')

@section('title', 'Setting Show')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tags icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Setting Detail</div>
    </div>
  </div>
</div>
<div class="mb-1">
  <a href="{{ route('setting.edit', [$setting->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit Setting</a>
</div>
<div class="card">
  <div class="card-body">
    <div class="form-group row">
      <label for="return_days" class="col-md-2 col-form-label">{{ __('Return Days') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="return_days" value="{{$setting->return_days}}" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="fine" class="col-md-2 col-form-label">{{ __('Fine Amount') }}</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="fine" value="{{$setting->fine}}" readonly>
      </div>
    </div>
  </div>
</div>

@endsection
