@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto">
                <input
                    autocomplete="off"
                    type="search"
                    class="form-control rounded"
                    placeholder=''
                    style="min-width: 225px"
                    />
                <span class="input-group-text border-0">
                    <i class="fas fa-search"></i
                ></span>
            </form>
        </div>
    </div>

    <!-- List Tables -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <a class="btn btn-info" href="#" role="button">Edit</a>
                    <a class="btn btn-danger" href="#" role="button">Delete</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                    <a class="btn btn-info" href="#" role="button">Edit</a>
                    <a class="btn btn-danger" href="#" role="button">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
