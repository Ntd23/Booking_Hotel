@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title">{{ $title }}</h5>
  </div>
  <form method="POST" enctype="multipart/form-data" @if (empty($amenity->id)) action="{{ url('admin/amenity/add-edit') }}"
  @else action="{{ url('admin/amenity/add-edit/'.$amenity->id) }}" @endif>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5" style="padding-left: 10px">
          <label for="icon">Icon</label>
          <input type="file" class="form-control" id="icon" name="icon" accept="image/*" style="padding: 6px 0px">
          @if (!empty($amenity->icon))
          <img src="{{ asset('storage/' . $amenity->icon) }}" alt="amenity"  class="mt-3"
          id="preview-image" style="display: block;width: 100px;">
          @else <img id="preview-image" class="mt-3" style="display: none; width: 100px;">  @endif
          @error('icon')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-5" style="padding-right: 10px">
          <label for="name">Tiện Nghi</label>
          <input type="text" class="form-control" id="name" name="name" @if (empty($amenity->name)) placeholder="Nhập tiện nghi"
          @else value="{{ $amenity->name }}" @endif>
          @error('name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group mb-3 col-md-10">
        <label for="description">Mô tả</label>
        <textarea name="description" class="form-control" id="description">@if (!empty($amenity->description))  {{ $amenity->description }} @endif</textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group col-md-5">
        <label for="price">Giá Tiền</label>
        <input type="number" class="form-control" id="price" name="price"  @if (empty($amenity->price))  placeholder="Nhập giá tiền"
        @else value="{{ $amenity->price }}" @endif>
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-lg">
          @if (empty($amenity->id)) Thêm
          @else Cập Nhật @endif
        </button>
      </div>
    </div>
</div>
</form>
</div>

@endsection
