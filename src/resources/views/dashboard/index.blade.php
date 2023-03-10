@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-tv icon-gradient bg-mean-fruit"></i>
      </div>
      <div>Analytics Dashboard</div>
    </div>
  </div>
</div>
<div class="row">
  @foreach ($counts as $name => $value)
    <div class="col-md-6 col-xl-4">
      <div class="card mb-3 widget-content {{Arr::random($class)}}">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">Total {{$name}}</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>{{$value}}</span></div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
