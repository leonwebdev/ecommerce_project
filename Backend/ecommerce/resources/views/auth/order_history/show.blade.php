@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="wrapper d-flex">
                <aside class="width-12 p-e-2 border-right d-block m-e-0">
                    <a href="{{ route('profile') }}" class="d-block btn btn_white_no_border lh">User Info</a>
                    <a href="{{ route('order-history') }}" class="d-block btn btn_black bg-black fw-bold">Order History</a>
                </aside>
                <div class="content form" id="profile">
                    <h1 class="my-2">{{ $title }}</h1>
                    <div id="order_history_container" class="my-2">
                        @if (Auth::user()->id !== $user->id)
                            <h3 class="text-align-center my-3 mx-3">You are not authorised to view this order detail. <a
                                    href="/product" id="shopping_now">Shopping Now.</a></h3>
                        @else
                            <div class="order_container mx-1 mb-5">
                                <div class="order_heading d-flex justify-content-space-between align-items-center">
                                    <h2 class="fw-bold mb-1">Order Status</h2>
                                    <div><a href="" class="lh-btn no-hover text-transform-capitalize"
                                            onclick="event.preventDefault();">{{ $order->order_status }}</a></div>
                                </div>
                                <div class="product_list overflow-x-scroll">
                                    <table style="border-collapse: collapse">
                                        <thead>
                                            <tr>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey">&#35;</th>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey min-width-20">Name</th>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Size</th>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Unit Price</th>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Quantity</th>
                                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->products as $key => $product)
                                                <tr>
                                                    <td class="vertical-align-top py-1 border-grey fw-bold pe-1">{{ $key + 1 }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-3 min-width-20">{{ $product->pivot->product_name }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">{{ $product->pivot->size }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">&#36;{{ $product->pivot->unit_price }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">&#215;{{ $product->pivot->quantity }}</td>
                                                    <td class="vertical-align-top py-1 border-grey pe-1">&#36;{{ $product->pivot->line_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    <div class="d-flex justify-content-end my-2">
                                        <div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">GST:
                                                </span>&#36;{{ $order->gst }}</div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">PST:
                                                </span>&#36;{{ $order->pst }}</div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">HST:
                                                </span>&#36;{{ $order->hst }}</div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">Subtotal:
                                                </span>&#36;{{ $order->sub_total }}</div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">Shipping
                                                    charge: </span>&#36;{{ $order->shipping_charge }}</div>
                                            <div class="mb-0_5 text-align-right"><span class="text-black fw-bold">TOTAL:
                                                </span>&#36;{{ $order->total }}</div>
                                        </div>
                                    </div>
                                    <div class="mb-0_5"><span class="text-black fw-bold">Order Date:
                                        </span>{{ $order->created_at }}</div>
                                    <div class="mb-0_5"><span class="text-black fw-bold">Shipping address:
                                        </span>{{ $order->shipping_address }}</div>
                                    <div class="mb-0_5"><span class="text-black fw-bold">Billing address:
                                        </span>{{ $order->billing_address }}</div>
                                    <div class="d-flex justify-content-end my-2">
                                        <div>
                                            <div class="text-align-right">
                                                <a href="{{ route('order-history-invoice', ['id' => $order->id]) }}"
                                                    class="lh-btn fs-1" target="_blank">View Invoice</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
