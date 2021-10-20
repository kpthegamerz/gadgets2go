@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Shipping</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.store')}}">
        {{csrf_field()}}

        {{-- <div class="form-group">
          <label for="courier_id">Courier</label>
          <select name="courier_id" class="form-control">
              <option value="">--Select Courier--</option>
             @foreach($couriers as $courier)
              <option value="{{$courier->id}}">{{$courier->name}}</option>
             @endforeach
          </select>
        </div> --}}

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Region <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="type" placeholder="Enter title"  value="{{old('type')}}" class="form-control">
        @error('type')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="small" class="col-form-label">Small <span class="text-danger">*</span></label>
        <input id="small" type="number" name="small" placeholder="Enter price for small item"  value="{{old('small')}}" class="form-control">
        @error('small')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="medium" class="col-form-label">Medium <span class="text-danger">*</span></label>
        <input id="medium" type="number" name="medium" placeholder="Enter price for medium item"  value="{{old('medium')}}" class="form-control">
        @error('medium')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="large" class="col-form-label">Large <span class="text-danger">*</span></label>
        <input id="large" type="number" name="large" placeholder="Enter price for large item"  value="{{old('large')}}" class="form-control">
        @error('large')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="xlarge" class="col-form-label">XLarge <span class="text-danger">*</span></label>
        <input id="xlarge" type="number" name="xlarge" placeholder="Enter price for large item"  value="{{old('xlarge')}}" class="form-control">
        @error('xlarge')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>



        {{-- <div class="form-group">
          <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
        <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
        @error('price')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div> --}}
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
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