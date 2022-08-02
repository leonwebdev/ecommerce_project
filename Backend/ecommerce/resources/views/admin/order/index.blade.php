@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="{{ route('admin_order_list') }}" method="get">
                <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                    maxlength="255" style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <div>* All currency is displayed in CAD.</div>
    <!-- List Tables -->
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Date & Time</th>
                <th scope="col">Customer</th>
                <th scope="col">Email</th>
                <th scope="col">No. of Items</th>
                <th scope="col">Subtotal</th>
                <th scope="col">GST</th>
                <th scope="col">PST</th>
                <th scope="col">HST</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr data-bs-toggle="collapse" data-bs-target="#order{{ $order->id }}" class="accordion-toggle">
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->user->first_name }}, {{ $order->user->last_name }}</td>
                <td>{{ $order->user->email }}</td>
                <td class="text-center">
                    @php
                        $qty = 0;

                        foreach($order->products as $product) {
                            $qty += $product->pivot->quantity;
                        }
                    @endphp
                    {{ $qty }}
                </td>
                <td>{{ $order->sub_total }}</td>
                <td>${{ $order->gst }}</td>
                <td>${{ $order->pst }}</td>
                <td>${{ $order->hst }}</td>
                <td><strong>${{ $order->total }}</strong></td>
                <td
                    class="
                        @if($order->order_status == 'pending')
                            text-secondary
                        @elseif($order->order_status == 'confirmed')
                            text-primary
                        @elseif($order->order_status == 'delivered')
                            text-success
                        @elseif($order->order_status == 'cancelled')
                            text-danger
                        @endif
                    "
                >{{ $order->order_status }}</td>
                <td>
                    <button class="btn btn-secondary btn-xs">
                        Order Details
                    </button>
                </td>
            </tr>

            <tr>
                <td colspan="12" class="hiddenRow">
                    <div class="accordian-body collapse" id="order{{ $order->id }}">
                        <div class="shipping_info">
                            <div>
                                <strong>Shipping Charged:</strong>
                                ${{ $order->shipping_charge }}
                            </div>

                            <div>
                                <strong>Shipping Address:</strong>
                                {{ $order->shipping_address }}
                            </div>
                        </div>
                        <div class="status">
                            <h4>Update Order Status</h4>
                            <a class="btn btn-secondary"
                                href="{{ route('admin_product_edit', ['product' => $order->id]) }}">Pending</a>
                            <a class="btn btn-primary"
                                href="{{ route('admin_product_edit', ['product' => $order->id]) }}">Confirmed</a>
                            <a class="btn btn-success"
                                href="{{ route('admin_product_edit', ['product' => $order->id]) }}">Delivered</a>
                            <a class="btn btn-danger"
                                href="{{ route('admin_product_edit', ['product' => $order->id]) }}">Cancelled</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr class="info table-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Line Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order->products as $product)
                                <tr class="accordion-toggle table-light">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->size }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>${{ $product->pivot->line_price }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    <div class="px-3">
        {!! $orders->links('pagination::bootstrap-5') !!}
    </div>
@endsection
