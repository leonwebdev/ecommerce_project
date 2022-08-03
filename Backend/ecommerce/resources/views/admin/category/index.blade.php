@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <div class="d-flex my-auto">
            <!-- add category -->
            <a href="/admin/category/create" class="btn btn-secondary mx-2">Add a Category</a></td>

            <!-- Search form -->
            <div class="search_form">
                <form class="d-md-flex input-group w-auto my-auto" action="/admin/category" method="get">
                    <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                        maxlength="255" style="min-width: 225px" />
                    <button class="input-group-text border-0" type="submit">
                        <i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- List Tables -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr scope="row">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td><img src="/storage/{{ $category->image }}" height="100px" width="100px" /></td>
                    <td><a href="/admin/category/edit/{{ $category->id }}" class="btn btn-info">Edit</a>
                        <form method="post" action="/admin/category/{{ $category->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}" />
                            <button class="btn btn-danger"
                                onclick="return confirm('Do you really want to delete {{ $category->title }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $categories->links('pagination::bootstrap-5') !!}
    </div>
@endsection
