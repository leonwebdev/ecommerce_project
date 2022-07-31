<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            background-color: #fff;
            min-height: 3rem;
        }

        h1 {
            text-align: center;
            margin: 3rem auto;
        }

        h2{
            margin: 2rem auto;
        }
        .fw-bold {
            font-weight: 700;
        }

        .d-flex {
            display: flex;
        }

        .order_container {
            border-bottom: 1px solid rgba(92, 92, 92, 0.382);
            padding-bottom: 1rem;
        }

        .order_heading {
            margin-bottom: 1rem;
        }

        .mx-2 {
            margin-left: 2rem;
            margin-right: 2rem;
        }

        .pb-1 {
            padding-bottom: 1rem;
        }

        .mb-1 {
            margin-bottom: 1rem;
        }

        .my-2 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .justify-content-space-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .pe-1 {
            padding-right: 1rem;
        }

        .pm-1 {
            padding-bottom: 1rem;
        }

        .text-black {
            color: #0a0a0a;
        }

        .border-grey {
            border-bottom: 1px solid rgb(227, 227, 227);
        }

        .min-width-16 {
            min-width: 16rem;
        }

        .vertical-align-top {
            vertical-align: top;
        }

        .py-1 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .pe-3 {
            padding-right: 3rem;
        }

        .justify-content-end {
            justify-content: end;
        }

        .mb-0_5 {
            margin-bottom: 0.5rem;
        }

        .text-align-right {
            text-align: right;
        }
        .text-align-center {
            text-align: center;
        }
        .footer{
            color: #fff;
            background-color: rgb(33, 34, 35);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        p.small{
            font-size: 0.7rem;
        }
        a{
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Uptrend Invoice</h1>
        <h3>Hello! {{ $user->first_name . ' ' . $user->last_name . ',' }}</h3>
        <p>We really appreciate your patronage. Here is your order invoice, please keep this for your records.</p>
        <div id="order_history_container" class="">
            <div class="order_container">
                <div class="product_list">
                    <table style="border-collapse: collapse">
                        <thead>
                            <tr>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">&#35;</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey min-width-16">Name</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Size</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Unit Price</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Quantity</th>
                                <th class="pe-1 pm-1 fw-bold text-black border-grey">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $key => $product)
                                <tr>
                                    <td class="vertical-align-top py-1 border-grey fw-bold pe-1">{{ $key + 1 }}
                                    </td>
                                    <td class="vertical-align-top py-1 border-grey pe-3 min-width-16">
                                        {{ $product->pivot->product_name }}</td>
                                    <td class="vertical-align-top py-1 border-grey pe-1">{{ $product->pivot->size }}
                                    </td>
                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                        &#36;{{ $product->pivot->unit_price }}</td>
                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                        &#215;{{ $product->pivot->quantity }}</td>
                                    <td class="vertical-align-top py-1 border-grey pe-1">
                                        &#36;{{ $product->pivot->line_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                </div>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div class="d-flex justify-content-space-between mx-2 mb-2">
            <p class="small pb-1"><a href="#">Privacy</a></p>
            <p class="small pb-1"><a href="#">Email Preference</a></p>
            <p class="small pb-1"><a href="#">Terms &amp; Conditions</a></p>
            <p class="small pb-1"><a href="#">Unsubscribe</a></p>
            <p class="small pb-1"><a href="#">Help Center</a></p>
        </div>
        <div class="mx-2">
            <p class="small"><strong>Uptrend</strong> International Co.,Ltd</p>
            <p class="small">Unit 2701, 1257 Square Tower, </p>
            <p class="small">Winnipeg, Manitoba, Canada</p>
            <p class="small fw-bold">R3B 9S7</p>
            <p class="small">&#40;+1&#41; 207-589-1426</p>
            <p class="small"><a href="https://team3.uwpace.ca"><strong>Uptrend</strong>.com</a></p>
        </div>
    </div>
</body>

</html>
