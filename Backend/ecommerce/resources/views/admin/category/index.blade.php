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
        <a href="/admin/category/create" class="btn btn-primary">Add a Category</a></td>


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
    @foreach($categories as $category)
    <tr scope="row">
    <td>{{ $category->id }}</td>
    <td>{{ $category->title }}</td>
    <td><img src="/storage/{{ $category->image }}" height="100px" width="100px"/></td>
    <td><a href="/admin/category/edit/{{ $category->id }}" class="btn btn-info">Edit</a>
    <form method="post" action="/admin/category/{{ $category->id }}">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $category->id }}" />
              <button
              class="btn btn-danger" onclick="return confirm('Do you really want to delete {{ $category->title }}?')">Delete</button>
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