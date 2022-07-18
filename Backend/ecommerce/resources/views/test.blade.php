@extends('layouts.app')

@section('content')
    <div class="container test_purpose">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-black">
                    <p class="text-danger">whoami : {{ $whoami }}</p>
                    <div class="tgdiv"><p class="tglb">&#9658;User</p><p>{{ $users }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;shipping_charge</p><p>{{ $shipping_charge }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;tax</p><p>{{ $tax }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;inquiry</p><p>{{ $inquiry }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;user_address</p><p>{{ $user_address }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;user_1_address</p><p>{{ $user_1_address }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;order</p><p>{{ $order }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;transaction</p><p>{{ $transaction }}</p></div>
                    <div class="tgdiv"><p class="tglb">&#9658;order_variant</p><p>{{ $order_variant }}</p></div>
                </div>
            </div>
        </div>
    </div>
@endsection
