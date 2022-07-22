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
    <a href="/admin/category/create" class="btn btn-primary">Add a Advertisement</a></td>
    <!-- List Tables -->
    <table class="table table-striped">
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Pages</th>
            <th scope="col">Area</th>
          </tr>
        </thead>
        <tbody>
          @foreach($inquiries as $inquiry)
          <tr scope="row">
          <td>{{ $inquiry->id }}</td>
          <td><img src="/storage/{{ $inquiry->image }}" height="100px" width="100px"/></td>
          <td>{{ $inquiry->title }}</td>
          <td>{{ $inquiry->link }}</td>
          <td>{{ $inquiry->pages }}</td>
          <td>{{ $inquiry->area }}</td> 
          <td><a href="/admin/inquiry/edit/{{ $inquiry->id }}" class="btn btn-info">Edit</a>
          <form method="post" action="/admin/inquiry/{{ $inquiry->id }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $inquiry->id }}" />
                    <button
                    class="btn btn-danger" onclick="return confirm('Do you really want to delete {{ $inquiry->title }}?')">Delete</button>
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