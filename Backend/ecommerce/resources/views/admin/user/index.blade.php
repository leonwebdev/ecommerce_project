@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="/admin/user" method="get">
                <input autocomplete="off" name="search" type="search" class="form-control rounded" placeholder="Search" style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Default Address</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr scope="row">
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('admin_user_edit', ['user' => $user->id]) }}"
                            class="text-decoration-none">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->full_address() }}</td>
                    <td class="fw-bold">{{ $user->user_postal_code() }}</td>
                    <td>
                        <div class="row mx-0">
                            <div class="col-auto ps-0 ms-0">
                                <a class="btn btn-info" href="{{ route('admin_user_edit', ['user' => $user->id]) }}"
                                    role="button">Edit</a>
                            </div>
                            @if ($user->admin == true)
                                <div class="col-auto ps-0 ms-0" tabindex="0" data-bs-toggle="tooltip" title="Cannot Delete Admin User">
                                    <a href="" class="btn btn-outline-danger disabled" role="button"
                                        onclick="event.preventDefault();">Delete</a>
                                </div>
                            @else
                                <div class="col-auto ps-0 ms-0">
                                    <form method="post" action="/admin/user/{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $user->id }}" />
                                        <button onclick="return confirm('Confirm delete this?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $users->links('pagination::bootstrap-5') !!}
    </div>
@endsection
