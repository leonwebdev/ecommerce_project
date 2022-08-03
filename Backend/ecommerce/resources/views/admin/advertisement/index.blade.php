@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <div class="d-flex my-auto">
            <!-- add advertisement -->
            <a href="/admin/advertisement/create" class="btn btn-secondary mx-2">Add a Advertisement</a></td>

            <!-- Search form -->
            <div class="search_form">
                <form class="d-md-flex input-group w-auto my-auto" action="/admin/advertisement" method="get">
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
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Link</th>
                <th scope="col">Pages</th>
                <th scope="col">Area</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advertisements as $advertisement)
                <tr scope="row">
                    <td>{{ $advertisement->id }}</td>
                    <td><img src="/storage/{{ $advertisement->image }}" height="100px" width="100px" /></td>
                    <td>{{ $advertisement->title }}</td>
                    <td><a href="{{ $advertisement->link }}" title="link">{{ $advertisement->link }}</a></td>
                    <td>{{ $advertisement->pages }}</td>
                    <td>{{ $advertisement->area }}</td>
                    <td><a href="/admin/advertisement/edit/{{ $advertisement->id }}" class="btn btn-info">Edit</a>
                        <form method="post" action="/admin/advertisement/{{ $advertisement->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $advertisement->id }}" />
                            <button class="btn btn-danger"
                                onclick="return confirm('Do you really want to delete {{ $advertisement->title }}?')">Delete</button>
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
