@extends('core::admin.master')

@section('content-header')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box"></div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach($myDashboard as $dashboard)
            <div class="col-md-{{ $dashboard->col() }} mb-4">
                {{ $dashboard }}
            </div>
        @endforeach
    </div>
@stop

@if (session()->has('admin_login'))
    @push('scripts')
        <script>
            toastr.options.closeDuration = 300;
            toastr.success('Đăng nhập thành công!', {
                timeOut: 5
            });
        </script>
    @endpush
    @php(session()->forget('admin_login'))
@endif
