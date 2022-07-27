@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">Edit Category</h2>
        </div>
        <div class="card-body">
            {{-- {{ $errors }} --}}
          <form  enctype="multipart/form-data" id="edit" action="/admin/category/{{ $category->id }}" method="post">
              @csrf 
              @method('PUT')
              <input type="hidden" name="id" value="{{ $category->id }}" />
              <div class="mb-3">
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
              <div class="mb-3">
                <input type="submit" class="btn btn-primary">
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
    
    
@endsection