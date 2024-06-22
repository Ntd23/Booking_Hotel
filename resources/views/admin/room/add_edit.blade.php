@extends('admin.app')

@section('content')
<div class="card dark-mode">
  <div class="card-header">
    <h5 class="card-title">{{ $title }}</h5>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" style="margin: 6px;" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="POST" enctype="multipart/form-data" @if (empty($room->id)) action="{{ url('admin/room/add-edit') }}"
    @else
    action="{{ url('admin/room/add-edit/' . $room->id) }}" @endif>
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="name">Tên phòng</label>
          <input type="text" class="form-control" id="name" name="name" @if (empty($room->name)) placeholder="Nhập tên
          phòng"
          @else
          value="{{ $room->name }}" @endif>
        </div>
        <div class="form-group col-md-5 ml-5">
          <label for="price">Giá Tiền</label>
          <input type="text" class="form-control" id="price" name="price" @if (empty($room->price)) placeholder="Nhập
          giá tiền"
          @else
          value="{{ $room->price }}" @endif>
        </div>
        <div class="form-group col-md-5">
          <label for="image">Hình Ảnh</label>
          <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
          @if (isset($room->image))
          <img src="{{ asset('storage/' . $room->image) }}" alt="room"  class="mt-3"
            id="preview-image" style="display: block;max-width: 300px;">
          @endif
        </div>
        <div class="form-group col-md-5">
          <label for="video" style="margin-left: 50px">Video</label>
          <input type="file" class="form-control" id="video" name="video" style="margin-left: 50px"
            onchange="previewVideo(event)">
          @if (isset($room->video))
          <video controls style="width: 100%; height: 64%; margin-left: 50px" class="mt-3">
            <source src="{{ asset('storage/' . $room->video) }}" type="video/mp4" class="mt-3" id="preview-video"
              style="display: none">
          </video>
          @endif
        </div>
        <div class="form-group col-md-5">
          <label for="quantity">Số Lượng</label>
          <input type="number" class="form-control" id="quantity" name="quantity" @if (empty($room->quantity))
          placeholder="Nhập số lượng"
          @else
          value="{{ $room->quantity }}" @endif>
        </div>
        <div class="form-group col-md-5 d-flex justify-content-center" style="margin-left: 25px; margin-top: 25px;">
          <label for="quantity" style="width: 100px">Số Lượng Người Lớn</label>
          <select name="quantity_adult" style="width: auto; height: 40px; margin-right: 30px">
            @foreach ($enumQuantityAdult as $adult)
            <option value="{{ $adult }}" {{ $adult==$room->quantity_adult ? 'selected' : '' }} >{{ $adult }}</option>
            @endforeach
          </select>
          <label for="quantity" style="width: 87px">Số Lượng Trẻ Em</label>
          <select name="quantity_child" style="width: auto; height: 40px; margin-right: 30px">
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
        <div class="form-group col-md-12 text-center">
          <button type="submit" class="btn btn-success btn-lg">
            @if (!empty($room->id)) Cập Nhật
            @else Thêm
            @endif
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection

