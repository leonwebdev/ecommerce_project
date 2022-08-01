@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-8">
      <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">Edit Shipping Charge</h2>
        </div>
        <div class="card-body">
            {{-- {{ $errors }} --}}
          <form  enctype="multipart/form-data" id="edit" action="/admin/shipping-charge/{{ $shippingcharge->id }}" method="post">
              @csrf 
              @method('PUT')
              <input type="hidden" name="id" value="{{ $shippingcharge->id }}" />
              <div class="mb-3">
                <label for="continent" class="form-label">Continent</label>
                <input type="text" name="continent" class="form-control" id="continent" value="{{ old('continent', $shippingcharge->continent) }}" />
                @error('continent')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="country" class="form-label">Continent</label>
                <input type="text" name="country" class="form-control" id="country" value="{{ old('country', $shippingcharge->country) }}" />
                @error('country')
                  <span style="color: #900">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="charge" class="form-label">Continent</label>
                <input type="text" name="charge" class="form-control" id="charge" value="{{ old('charge', $shippingcharge->charge) }}" />
                @error('charge')
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