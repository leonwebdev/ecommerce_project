@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto">
                <input autocomplete="off" type="search" class="form-control rounded" placeholder='' style="min-width: 225px" />
                <span class="input-group-text border-0">
                    <i class="fas fa-search"></i></span>
            </form>
        </div>
    </div>
    <a href="{{ route('admin_product_add') }}" class="btn btn-primary">Add a Product</a>

    <!-- List Tables -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Size</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr scope="row">
                    <td>{{ $product->id }}</td>
                    <td>
                        @if ($product->product_media && count($product->product_media))
                            <img src="{{ asset('/storage/' . $product->product_media[0]->image) }}" height="100px"
                                width="100px" />
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->categories->implode('title', ', ') }}</td>
                    <td>{{ $product->size->name }}</td>
                    <td>{{ $product->gender->name }}</td>

                    <td>
                        <a class="btn btn-info" href="#" role="button">Edit</a>
                        <a class="btn btn-danger" href="#" role="button">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="px-3">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div>
@endsection
