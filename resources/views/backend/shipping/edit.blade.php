@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Shipping Charges</h5>
    <div class="card-body">
      <form method="post" action="{{route('shipping.update',$shipping->id)}}">
        @csrf 
        @method('PATCH')
        {{-- <div class="form-group">
          <label for="small" class="col-form-label">Small <span class="text-danger">*</span></label>
        <input id="small" type="number" name="small" placeholder="Enter price for small item"  value="{{$shipping->small}}" class="form-control">
        @error('small')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div> --}}

        <div class="form-group">
          <label for="medium" class="col-form-label">Medium <span class="text-danger">*</span></label>
        <input id="medium" type="number" name="medium" placeholder="Enter price for medium item"  value="{{$shipping->medium}}" class="form-control">
        @error('medium')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="large" class="col-form-label">Large <span class="text-danger">*</span></label>
        <input id="large" type="number" name="large" placeholder="Enter price for large item"  value="{{$shipping->large}}" class="form-control">
        @error('large')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="xlarge" class="col-form-label">XLarge <span class="text-danger">*</span></label>
        <input id="xlarge" type="number" name="xlarge" placeholder="Enter price for large item"  value="{{$shipping->xlarge}}" class="form-control">
        @error('xlarge')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>       

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($shipping->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($shipping->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
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