@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:230px">
    <div class="row">
        <div class="col-8">
<form  enctype="multipart/form-data" id="edit" action="/admin/category/{{ $category->id }}" method="post">
    @csrf 
    @method('PUT')
    <div class="card">
    <h1>Edit a Category</h1>
    <div class="card-body">

    <div class="mb-3">
    <input type="hidden" name="id" value="{{ $category->id }}" />
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $category->title) }}" />
  @error('name')
                <span style="color: #900">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  @if($category->image)
    <img src="/storage/{{ $category->image }}" alt="{{ $category->title }}" 
            style="height: 100px;width:auto"/><br />
    @endif
  <input type="file" name="image" class="form-control" id="image" />
  @error('image')
                <span style="color: #900">{{ $message }}</span>
@enderror
</div>

<br />
    <p><button type="submit" class="btn btn-success">Submit</button></p>

</div>
</div>
</form>
</div>
    </div>
</div>
    
@endsection