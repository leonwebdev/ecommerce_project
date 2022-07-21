@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:230px">
    <div class="row">
        <div class="col-8">
<form  enctype="multipart/form-data" id="create" action="/admin/category" method="post">
    @csrf 
    <div class="card">
    <h1>Create a new Category</h1>
    <div class="card-body">

    <div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" />
  @error('title')
                <span style="color: #900">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
  <label for="image" class="form-label">Image</label>
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