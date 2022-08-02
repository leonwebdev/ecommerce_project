@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="wrapper d-flex">
                <aside class="width-12 p-e-2 border-right d-block m-e-0">
                    <a href="#" class="d-block btn btn_black bg-black fw-bold">User Info</a>
                    <a href="{{ route('order-history') }}" class="d-block btn btn_white_no_border">Order History</a>
                </aside>
                <div class="content form" id="profile">
                    <div class="d-flex justify-content-space-between align-items-center">
                        <div class="width-8">&nbsp;</div>
                        <div class="">
                            <h1 class="my-2">{{ $title }}</h1>
                        </div>
                        <div class="width-8 text-align-end"><a href="{{ route('profile-edit', ['user' => $user->id]) }}"
                                class="lh-btn fs-1">Edit</a></div>
                    </div>
                    <p class="col col-5 fs-1_4 text-end fw-bold">Name : </p>
                    <p class="col col-7 fs-1_4 text-start">{{ $user->first_name . ' ' . $user->last_name }}</p>
                    <p class="col col-5 fs-1_4 text-end fw-bold">Email : </p>
                    <p class="col col-7 fs-1_4 text-start">{{ $user->email }}</p>
                    <p class="col col-5 fs-1_4 text-end fw-bold">Phone : </p>
                    <p class="col col-7 fs-1_4 text-start">{{ $user->phone }}</p>
                    <hr class="my-2">
                    <div id="User_address">
                        <h1 class="my-3">User Address</h1>
                        @foreach ($addresses as $key => $address)
                            <div class="address_row d-flex fs-1_4 align-items-top" id="address_{{ $address->id }}">
                                <div class="key fw-bold pe-1 width-max-content">&#35;{{ $key + 1 }}</div>
                                <div class="full_address pe-1 flex-grow-1">
                                    <div>{{ $address->full_address() }}</div>
                                    <div class="fw-bold">{{ $address->user_postal_code() }}</div>
                                </div>
                                <div class="action d-flex width-max-content align-items-top">
                                    <div class="width-max-content pe-0_5"><a
                                            href="{{ route('address-edit', ['user_address' => $address->id]) }}"
                                            class="lh-btn">Edit</a></div>
                                    <div class="width-max-content pe-0_5">
                                        @if ($address->is_default_address())
                                            <div class="width-max-content flex-grow-1">
                                                <a href="" class="lh-btn-outline" style="color: rgb(181, 182, 185);border: 1px solid rgb(189, 189, 192);"
                                                    onclick="event.preventDefault();">Delete</a>
                                            </div>
                                        @else
                                            <form method="post" action="/address/{{ $address->id }}"
                                                style="width: min-content">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $address->id }}" />
                                                <button onclick="return confirm('Confirm delete this?')"
                                                    class="lh-btn-delete">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                    @if ($address->is_default_address())
                                        <div class="width-max-content flex-grow-1">
                                            <a href="" class="lh-btn-outline"
                                                onclick="event.preventDefault();">Default Addr.</a>
                                        </div>
                                    @else
                                        <div class="width-max-content flex-grow-1">
                                            <a href="" class="lh-btn"
                                                onclick="event.preventDefault();
                                                document.getElementById('set_default_address_{{ $address->id }}').submit();"
                                                >Set as Default</a>
                                        </div>
                                        <form action="/default-address/{{ $address->id }}" method="post" class="d-none"
                                            id="set_default_address_{{ $address->id }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end my-3">
                        <a href="{{ route('address_add') }}" class="lh-btn fs-1_5">Add New Address</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
