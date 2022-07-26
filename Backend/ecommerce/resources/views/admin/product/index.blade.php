@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="{{ route('admin_product_list') }}" method="get">
                <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                    maxlength="255" style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
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
                        <a class="btn btn-info"
                            href="{{ route('admin_product_edit', ['product' => $product->id]) }}">Edit</a>
                        <form method="post" action="{{ route('admin_product_delete', ['product' => $product->id]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            <button class="btn btn-danger"
                                onclick="return confirm('Do you really want to delete {{ $product->name }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="px-3">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div>
@endsection
