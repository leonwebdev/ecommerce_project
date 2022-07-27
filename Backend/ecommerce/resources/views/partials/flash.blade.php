@if (session()->has('success'))
    <div class="wrapper wrapper-alert">
        <div class="alert alert-success text-center">
            <div class="fw-bold">{{ session('success') }}</div>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="wrapper wrapper-alert">
        <div class="alert alert-danger text-center">
            <div class="fw-bold">{{ session('error') }}</div>
        </div>
    </div>
@endif
