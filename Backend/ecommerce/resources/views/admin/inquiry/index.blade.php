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
    <!-- List Tables -->
    <table class="table table-striped">
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($inquiries as $inquiry)
          <tr scope="row">
          <td>{{ $inquiry->id }}</td>
          <td>{{ $inquiry->name }}</td>
          <td>{{ $inquiry->email }}</td>
          <td>{{ $inquiry->phone }}</td>
          <td>{{ $inquiry->message }}</td>
          <td>
          <form method="post" action="/admin/inquiry/{{ $inquiry->id }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $inquiry->id }}" />
                    <button
                    class="btn btn-danger" onclick="return confirm('Do you really want to delete {{ $inquiry->name }}?')">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $inquiries->links('pagination::bootstrap-5') !!}
    </div>

@endsection