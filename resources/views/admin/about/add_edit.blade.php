@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title">{{ $title }}</h5>
  </div>
  <form method="POST" enctype="multipart/form-data" @if (empty($about->id)) action="{{ url('admin/about/add-edit') }}"
  @else action="{{ url('admin/about/add-edit/'.$about->id) }}" @endif>
    @csrf @method('POST')
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5" style="padding-right: 10px">
          <label for="title">Tiêu Đề</label>
          <input type="text" class="form-control" id="title" name="title" @if (empty($about->title)) placeholder="Nhập tiêu đề"
          @else value="{{ $about->title }}" @endif>
          @error('title')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-5" style="padding-left: 10px">
          <label for="image">Hình Ảnh</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*" style="padding: 6px 0px">
          @if (!empty($about->image))
          <img src="{{ asset('storage/' . $about->image) }}" alt="about"  class="mt-3"
          id="preview-image" style="display: block;width: 100%;">
          @else <img id="preview-image" class="mt-3" style="display: none; width: 100%;">  @endif
          @error('image')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

      </div>
      <div class="form-group mb-3 col-md-10">
        <label for="description">Mô tả</label>
        <textarea rows="8" name="description" class="form-control" id="description">@if (!empty($about->description))  {{ $about->description }} @endif</textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-lg">
          @if (empty($about->id)) Thêm
          @else Cập Nhật @endif
        </button>
      </div>
    </div>
</div>
</form>
</div>

@endsection
