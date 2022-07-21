@extends('layouts.app')

@section('content')

<div class="container">
<div class="wrapper">
<div class="row">
        <div class="col-8">

        <td><a href="/admin/category/create" class="btn btn-primary">Add a Category</a></td>

        <br />
</br />
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
    <td>{{ $category->id }}</td>
    <td>{{ $category->title }}</td>
    <td><img src="/storage/{{ $category->image }}" height="100px" width="100px"/></td>
    <td><a href="/admin/category/edit/{{ $category->id }}" class="btn btn-success">Edit</a></td>
    <td><form method="post" action="/admin/category/{{ $category->id }}">
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

    
</div>
</div>  
</div>
</div>

@endsection