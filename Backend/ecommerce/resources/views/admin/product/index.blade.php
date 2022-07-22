@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">

            <a href="{{ route('admin_product_add') }}" class="btn btn-primary">Add a Product</a>

            <br />
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Size</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                {{-- <img src="/storage/{{ $category->image }}" height="100px" width="100px" /> --}}
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->categories->implode('title', ', ') }}</td>
                            <td>{{ $product->size->name }}</td>
                            <td>{{ $product->gender->name }}</td>

                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3">
                {!! $products->links('pagination::bootstrap-5') !!}
            </div>


        </div>
    </div>
    </div>
    </div>
@endsection
