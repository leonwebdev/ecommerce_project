@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Add Shipping Charge</h2>
                </div>
                <div class="card-body">
                {{-- {{ $errors }} --}}
                <form  enctype="multipart/form-data" id="create" action="/admin/shipping-charge" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="continent" class="form-label">Continent</label>
                    <input type="text" name="continent" class="form-control" id="continent" value="{{ old('continent') }}" />
                    @error('continent')
                        <span style="color: #900">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" />
                    @error('country')
                        <span style="color: #900">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="charge" class="form-label">Charge</label>
                    <input type="text" name="charge" class="form-control" id="charge" value="{{ old('charge') }}" />
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