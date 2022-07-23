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

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
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
                    <td>{{ $user->full_address($user->id) }}</td>
                    <td class="fw-bold">{{ $user->user_postal_code($user->id) }}</td>
                    <td>
                        <div class="row">
                            <div class="col-auto ps-0 ms-0">
                                <a class="btn btn-info" href="{{ route('admin_user_edit', ['user' => $user->id]) }}"
                                    role="button">Edit</a>
                            </div>
                            <div class="col-auto ps-0 ms-0">
                                <form method="post" action="/admin/user/{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <button onclick="return confirm('Confirm delete this?')"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </div>
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
