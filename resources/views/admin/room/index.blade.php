@extends('admin.app')

@section('content')

<div class="card dark-mode">
  <div class="card-header">
    <h3 class="card-title" style="margin-top: 10px">Danh sách các phòng</h3>
    <div class="float-right">
      <a href="{{ url('admin/room/add-edit') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> <span>Thêm</span>
      </a>
    </div><br>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @session('success_msg')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Thành công!!</strong> {{ Session::get('success_msg') }}
      <button type="button" class="close" style=" float:right" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endsession
    <table id="rooms" class="hover row-border" style="width:100%">
      <thead>
        <tr>
          <th>Tên Phòng</th>
          <th>Khách Hàng</th>
          <th>Giá</th>
          <th>Số Lượng</th>
          <th>Trạng Thái</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rooms as $room)
        <tr>
          <input type="hidden" class="deleteRoom" value="{{ $room->id }}">
          <td>{{ $room->name }}</td>
          <td>
            <span>Người Lớn: {{ $room->quantity_adult }}</span><br>
            <span>Trẻ Em: {{ $room->quantity_child }}</span>
          </td>
          <td>{{ $room->price }} VND</td>
          <td>{{ $room->quantity }}</td>
          <td>
            @if ($room->quantity==0)
            @php
              $room->status = 'unavailable'
            @endphp
            @endif
            @if ($room->status == 'available')
            <button type="button" class="btn btn-primary btn-sm disabled">{{ $room->status }}</button>
            @else
            <button type="button" class="btn btn-secondary btn-sm disabled">{{ $room->status }}</button>
            @endif
          </td>
          <td class="d-flex" style="justify-content: space-between">
            <a href="{{ url('admin/room/details/' . $room->id) }}" class="btn btn-info" style="width: 42px">
              <i class="fa fa-info"></i>
            </a>
            <a href="{{ url('admin/room/add-edit/' . $room->id) }}" class="btn btn-warning">
              <i class="fa fa-pen"></i>
            </a>
            <a href="{{ url('admin/room/delete/' . $room->id) }}" class="btn btn-group-sm btn-danger btnDeleteRoom">

              <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Tên Phòng</th>
          <th>Khách Hàng</th>
          <th>Giá</th>
          <th>Số Lượng</th>
          <th>Trạng Thái</th>
          <th>Thao Tác</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection
