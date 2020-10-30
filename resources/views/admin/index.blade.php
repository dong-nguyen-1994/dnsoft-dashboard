@extends('core::admin.master')

@section('content')
    <h1>Ai mang em đi</h1>
@stop

@push('scripts')

    <script>
        toastr.options.closeDuration = 300;
        toastr.success('Đăng nhập thành công!', {
            timeOut: 5
        });
    </script>
@endpush
