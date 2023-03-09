
<div class="card mb-4">
    <div class="card-body text-center">
        <div class="row justify-content-center">
            <div class="greet-user col-12 col-xl-10">
                <img src="{{ asset('vendor/dashboard/admin/img/users/happiness.svg') }}" alt="..." class="img-fluid  mb-2">
                <h2 class="fs-23 font-weight-600 mb-2">
                    {{ __('dashboard::message.welcome') }} {{ auth('admin')->user()->name }},
                </h2>
                <br>
                <p class="text-muted">
                    {{ \Illuminate\Foundation\Inspiring::quote() }}
                </p>
            </div>
        </div>
    </div>
</div>

