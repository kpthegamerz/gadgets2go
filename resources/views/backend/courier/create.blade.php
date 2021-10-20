@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Courier</h5>
    <div class="card-body">
      <form method="post" action="{{route('courier.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputName" class="col-form-label">Courier Name <span class="text-danger">*</span></label>
        <input id="inputName" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="cnumber" class="col-form-label">Contact number <span class="text-danger">*</span></label>
        <input id="cnumber" type="number" name="cnumber" placeholder="Enter Contact number"  value="{{old('cnumber')}}" class="form-control">
        @error('cnumber')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputcperson" class="col-form-label">Contact Person <span class="text-danger">*</span></label>
        <input id="inputcperson" type="text" name="cperson" placeholder="Enter Contact Person"  value="{{old('cperson')}}" class="form-control">
        @error('cperson')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputemail" class="col-form-label">Email <span class="text-danger">*</span></label>
        <input id="inputName" type="email" name="email" placeholder="Enter email"  value="{{old('email')}}" class="form-control">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputaddress" class="col-form-label">Address<span class="text-danger">*</span></label>
        <input id="inputaddress" type="text" name="address" placeholder="Enter Address"  value="{{old('address')}}" class="form-control">
        @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        {{-- <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div> --}}
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
{{-- <script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script> --}}
@endpush