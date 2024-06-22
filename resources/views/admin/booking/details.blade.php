@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title" style="line-height: 50px">{{ $title }} : {{ 'NSH' . $booking->id }}</h5>
    <div class="float-right" style="line-height: 50px">
      <a href="{{ url('admin/booking') }}" class="btn btn-light"><i class="fa fa-backward"></i></a>
    </div>
  </div>
  <form>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="name">Khách Hàng</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $booking->user->email }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="price">Phòng</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $booking->room->name }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="price">Giá Tiền</label>
          <input type="text" class="form-control" id="price" name="price" value="{{ number_format($booking->total_price). ' VND' }}" readonly>
        </div>
        <div class="form-group col-md-5" >
          <label for="quantity">Số Lượng</label>
          <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $booking->quantity_rooms_booking }}"
            readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="check_in_date">Ngày Nhận Phòng</label>
          <input type="date" class="form-control" id="check_in_date" name="check_in_date" value="{{ $booking->check_in_date }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="check_out_date">Ngày Trả Phòng</label>
          <input type="date" class="form-control" id="check_out_date" name="check_out_date" value="{{ $booking->check_out_date }}" readonly>
        </div>

        <div class="form-group col-md-5" >
          <label for="quantity">Số Lượng Người Lớn: </label>
          <span>{{ $booking->room->quantity_adult }}</span>
          <label for="quantity" style="margin-left: 16px;">Số Lượng Trẻ Em: </label>
          <span>{{ $booking->room->quantity_child }}</span>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection
