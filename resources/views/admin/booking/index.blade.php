@extends('admin.app')

@section('content')
@php
  use Carbon\Carbon;
@endphp
  <div class="card dark-mode">
    <div class="card-header">
      <h3 class="card-title" style="margin-top: 10px">Danh sách đặt phòng</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="bookings" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th>Khách Hàng</th>
            <th>Phòng</th>
            <th>Giá Tiền</th>
            <th>Ngày nhận phòng</th>
            <th>Ngày trả phòng</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bookings as $booking)
            <tr>
              <input type="hidden" class="deleteBooking" value="{{ $booking->id }}">
              <td>{{ $booking->user->email }}</td>
              <td>{{ $booking->room->name }}</td>
              <td>
              {{ number_format($booking->total_price) . ' VND' }}
              </td>
              <td>{{ $booking->check_in_date }}</td>
              <td>{{ $booking->check_out_date }}</td>
              <td >
                @if ($booking->status==0)
                <span class="btn btn-sm btn-warning">Chờ thanh toán</span>
                @elseif ($booking->status==1)
                <span class="btn btn-success">Đã thanh toán</span>
                @else <span class="btn btn-success">Đã trả phòng</span>
                @endif
              </td>
              <td class="line-highlight">
                <a href="{{ url('admin/booking/details/' . $booking->id) }}" class="btn btn-info" style="padding-right: 18px;">
                  <i class="fa fa-info"></i>
                </a>
                <a href="{{ url('admin/booking/print/'.$booking->id) }}" class="btn btn-primary"><i class="fa fa-file"></i></a>
                <a href="{{ url('admin/booking/delete/' . $booking->id) }}"
                  class="btn btn-group-sm btn-danger btnDeleteBooking">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Khách Hàng</th>
            <th>Phòng</th>
            <th>Giá Tiền</th>
            <th>Ngày nhận phòng</th>
            <th>Ngày trả phòng</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
