@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title" style="line-height: 50px">{{ $title }}</h5>
    <div class="float-right" style="line-height: 50px">
      <a href="{{ url('admin/room') }}" class="btn btn-light"><i class="fa fa-backward"></i></a>
    </div>
  </div>
  <form>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="name">Tên phòng</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" readonly>
        </div>
        <div class="form-group col-md-5 ml-5">
          <label for="price">Giá Tiền</label>
          <input type="text" class="form-control" id="price" name="price" value="{{ $room->price }}" readonly>
        </div>
        <div class="form-group col-md-5">
          <label for="image">Hình Ảnh</label>
          <img src="{{ asset('storage/' . $room->image) }}" alt="room"  class="mt-3"
            id="preview-image" style="display: block;max-width: 300px;">
        </div>
        <div class="form-group col-md-5">
          <label for="video" style="margin-left: 50px">Video</label>
          <video controls style="width: 100%; height: 64%; margin-left: 50px" class="mt-3">
            <source src="{{ asset('storage/' . $room->video) }}" type="video/mp4" class="mt-3">
          </video>
        </div>
        <div class="form-group col-md-5" style="margin-top: -47px">
          <label for="quantity">Số Lượng</label>
          <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $room->quantity }}"
            readonly>
        </div>
        <div class="form-group col-md-5 d-flex justify-content-center" style="margin-left: 0; margin-top: -38px;">
          <label for="quantity" style="width: 100px">Số Lượng Người Lớn</label>
          <select name="quantity_adult" style="width: auto; height: 40px; margin-right: 30px" disabled>
            @foreach ($enumQuantityAdult as $adult)
            <option value="{{ $adult }}" {{ $adult==$room->quantity_adult ? 'selected' : '' }} >{{ $adult }}</option>
            @endforeach
          </select>
          <label for="quantity" style="width: 87px">Số Lượng Trẻ Em</label>
          <select name="quantity_child" style="width: auto; height: 40px; margin-right: 30px" disabled>
            @if ($room->id=='')
            @foreach($enumQuantityChild as $child)
            <option value="{{ $child }}">
              {{ $child }}
            </option>
            @endforeach
            @else
            @foreach ($enumQuantityChild as $child)
            <option value="{{ $child }}" {{ $child==$room->quantity_child ? 'selected' : '' }} >{{ $child }}</option>
            @endforeach
            @endif

          </select>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection
