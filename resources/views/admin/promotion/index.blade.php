@extends('admin.app')

@section('content')
  <div class="card dark-mode">
    <div class="card-header">
      <h3 class="card-title" style="margin-top: 10px">Danh sách khuyễn mãi</h3>
      <div class="float-right">
        <a href="{{ url('admin/promotion/add-edit') }}" class="btn btn-primary">
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
      <table id="promotions" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th>Tên Khuyến Mãi</th>
            <th>Mã</th>
            <th>Giảm Giá</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($promotions as $promotion)
            <tr>
              <input type="hidden" class="deletePromotion" value="{{ $promotion->id }}">
              <td>{{ $promotion->name }}</td>
              <td>{{ $promotion->code }}</td>
              <td>{{ $promotion->discount }} %</td>
              <td>{{ $promotion->start_date }}</td>
              <td>{{ $promotion->end_date }}</td>
              <td class="d-flex" style="justify-content: space-between">
                <a href="{{ url('admin/promotion/details/' . $promotion->id) }}" class="btn btn-info" style="width: 42px">
                  <i class="fa fa-info"></i>
                </a>
                <a href="{{ url('admin/promotion/add-edit/' . $promotion->id) }}" class="btn btn-warning">
                  <i class="fa fa-pen"></i>
                </a>
                <a href="{{ url('admin/promotion/delete/' . $promotion->id) }}" class="btn btn-group-sm btn-danger btnDeletePromotion">

                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Tên Khuyến Mãi</th>
            <th>Mã</th>
            <th>Giảm Giá</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Thao Tác</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
