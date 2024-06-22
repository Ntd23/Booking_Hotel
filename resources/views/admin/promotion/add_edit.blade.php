@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title">{{ $title }}</h5>
  </div>
  <form method="POST" @if (empty($promotion->id)) action="{{
    url('admin/promotion/add-edit') }}"
    @else
    action="{{ url('admin/promotion/add-edit/' . $promotion->id) }}" @endif>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="name">Tên khuyễn mãi</label>
          <input type="text" class="form-control" id="name" name="name" @if (empty($promotion->name)) placeholder="Nhập
          tên
          khuyến mãi"
          @else
          value="{{ $promotion->name }}" @endif>
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label for="title">Tiêu đề</label>
          <input type="text" class="form-control" id="title" name="title" @if (empty($promotion->title)) placeholder="Nhập
          tiêu đề"
          @else
          value="{{ $promotion->title }}" @endif>
          @error('title')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group col-md-5">
          <label for="code">Mã giảm giá</label>
          <input type="text" class="form-control" id="code" name="code" @if (empty($promotion->code)) placeholder="Nhập
          mã giảm giá"
          @else
          value="{{ $promotion->code }}" @endif>
          @error('code')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group col-md-5">
          <label for="discount">Giảm giá (%)</label>
          <input type="number" class="form-control" id="discount" name="discount" @if (!isset($promotion->discount)) placeholder="Discount%"
          @else
          value="{{ $promotion->discount }}" @endif>
          @error('discount')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label for="start_date">Ngày bắt đầu</label>
          <input type="date" class="form-control" id="start_date" name="start_date" @if (!empty($promotion->start_date)) value="{{ $promotion->start_date }}" @endif>
          @error('start_date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label for="end_date">Ngày kết thúc</label>
          <input type="date" class="form-control" id="end_date" name="end_date" @if (!empty($promotion->end_date)) value="{{ $promotion->end_date }}" @endif>
          @error('end_date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-10">
          <label for="description">Mô tả</label>
          <textarea class="form-control" name="description" id="description" @if (empty($promotion->description)) value="{{ $promotion->description }}" @endif>
            {{ $promotion->description }}
          </textarea>
          @error('description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group col-md-12 text-center">
          <button type="submit" class="btn btn-success btn-lg">
            @if (!empty($promotion->id))
            Cập Nhật
            @else
            Thêm
            @endif
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection
