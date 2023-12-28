@extends('core::admin.master')

@section('meta_title', __('Welcome - Dashboard'))

@section('breadcrumbs')
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ trans('dashboard::message.index.breadcrumb') }}</a></li>
          <li class="breadcrumb-item active">{{ trans('Dashboard') }}</li>
        </ol>
      </div>
      <h4 class="page-title">{{ __('Welcome!') }}</h4>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  @foreach($myDashboard as $dashboard)
  <div class="col-md-{{ $dashboard->col() }} mb-4">
    @if ($dashboard->name() == 'Profile')
      @if (config('dashboard.is_display_profile'))
        {{ $dashboard }}
      @endif
    @endif
    @if ($dashboard->name() == 'Welcome')
      @if (config('dashboard.is_display_welcome'))
        {{ $dashboard }}
      @endif
    @endif
    @if ($dashboard->name() !== 'Welcome' && $dashboard->name() !== 'Profile')
      {{ $dashboard }}
    @endif
  </div>
  @endforeach
</div>
@stop
