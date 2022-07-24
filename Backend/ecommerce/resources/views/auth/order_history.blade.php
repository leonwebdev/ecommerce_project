@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="wrapper d-flex">
                <aside class="width-12 p-e-2 border-right d-block m-e-0">
                    <a href="{{ route('profile') }}" class="d-block btn btn_white_no_border lh">User Info</a>
                    <a href="#" class="d-block btn btn_black bg-black fw-bold">Order History</a>
                </aside>
                <div class="content form" id="profile">
                    <h1 class="my-2">{{ $title }}</h1>
                    <hr class="my-2">
                </div>
            </div>
        </div>
    </main>
@endsection
