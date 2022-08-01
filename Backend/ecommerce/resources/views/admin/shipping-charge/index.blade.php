@extends('layouts.admin')

@section('content')

    <div class="header_bar">
      <h1>{{ $title }}</h1>

      <!-- Search form -->
      <div class="search_form">
          <form class="d-md-flex input-group w-auto my-auto" action="/admin/shipping-charge" method="get">
              <input autocomplete="off" type="search" class="form-control rounded" name="search" placeholder='Search'
                  maxlength="255" style="min-width: 225px" />
              <button class="input-group-text border-0" type="submit">
                  <i class="fas fa-search"></i></button>
          </form>
      </div>
    </div>
    <a href="/admin/shipping-charge/create" class="btn btn-primary">Add Shiping Charge</a></td>
    <!-- List Tables -->
    <table class="table table-striped">
      <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Continent</th>
            <th scope="col">Country</th>
            <th scope="col">Charge</th>
          </tr>
        </thead>
        <tbody>
          @foreach($shippingcharges as $shippingcharge)
          <tr scope="row">
          <td>{{ $shippingcharge->id }}</td>
          <td>{{ $shippingcharge->continent }}</td>
          <td>{{ $shippingcharge->country }}</td>
          <td>{{ $shippingcharge->charge }}</td>
          <td><a href="/admin/shipping-charge/edit/{{ $shippingcharge->id }}" class="btn btn-info">Edit</a>
          <form method="post" action="/admin/charge/{{ $shippingcharge->id }}">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $shippingcharge->id }}" />
              <button class="btn btn-danger" onclick="return confirm('Do you really want to delete {{ $shippingcharge->continent }}?')">Delete</button>
          </form>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $shippingcharges->links('pagination::bootstrap-5') !!}
    </div>

@endsection