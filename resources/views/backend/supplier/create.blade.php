@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Supplier</h5>
    <div class="card-body">
      <form method="post" action="{{route('supplier.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
        <input id="name" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="cnumber" class="col-form-label">Contact Number <span class="text-danger">*</span></label>
        <input id="cnumber" type="number" name="cnumber" placeholder="Enter Contact Number"  value="{{old('cnumber')}}" class="form-control">
        @error('cnumber')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <div class="form-group">
            <label for="email" class="col-form-label">Email<span class="text-danger">*</span></label>
          <input id="email" type="text" name="email" placeholder="Enter Email"  value="{{old('email')}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
        <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
        <input id="address" type="text" name="address" placeholder="Enter Address"  value="{{old('address')}}" class="form-control">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush