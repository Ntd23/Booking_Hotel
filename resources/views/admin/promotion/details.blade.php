@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title" style="line-height: 50px">{{ $title }}</h5>
    <div class="float-right" style="line-height: 50px">
      <a href="{{ url('admin/promotion') }}" class="btn btn-light"><i class="fa fa-backward"></i></a>
    </div>
  </div>
  <form>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="name">Tên khuyến mãi</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $promotion->name }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="title">Tiêu đề</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $promotion->title }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="code">Mã giảm giá</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ $promotion->code }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="discount">Giảm giá (%)</label>
          <input type="number" class="form-control" id="discount" name="discount" value="{{ $promotion->discount }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="start_date">Ngày bắt đầu</label>
          <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $promotion->start_date }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="end_date">Ngày kết thúc</label>
          <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $promotion->end_date }}" readonly>
        </div>
        <div class="form-group col-md-10">
          <label for="description">Mô tả</label>
          <textarea class="form-control" name="description" id="description"  value="{{ $promotion->description }}" readonly>
            {{ $promotion->description }}
          </textarea>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection
