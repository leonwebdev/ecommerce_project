@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p class="text-success">sadfsadfsadf</p>
                    <p class="text-danger">whoami : {{ $whoami }}</p>
                    {{-- <p class="text-danger">{{ var_dump($users) }}</p> --}}
                    <p class="text-primary">{{ $users }}</p>
                    <p class="text-success">{{ $shipping_charge }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
