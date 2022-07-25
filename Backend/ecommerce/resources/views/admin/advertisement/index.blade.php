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
          @foreach($advertisements as $advertisement)
          <tr scope="row">
          <td>{{ $advertisement->id }}</td>
          <td><img src="/storage/{{ $advertisement->image }}" height="100px" width="100px"/></td>
          <td>{{ $advertisement->title }}</td>
          <td><a href="{{ $advertisement->link }}" title="link">{{ $advertisement->link }}</a></td>
          <td>{{ $advertisement->pages }}</td>
          <td>{{ $advertisement->area }}</td> 
          <td><a href="/admin/advertisement/edit/{{ $advertisement->id }}" class="btn btn-info">Edit</a>
          <form method="post" action="/admin/advertisement/{{ $advertisement->id }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $advertisement->id }}" />
                    <button
                    class="btn btn-danger" onclick="return confirm('Do you really want to delete {{ $advertisement->title }}?')">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $advertisements->links('pagination::bootstrap-5') !!}
    </div>

@endsection