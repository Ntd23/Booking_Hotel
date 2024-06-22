@extends('admin.app')

@section('content')

  <div class="card dark-mode">
    <div class="card-header">
      <h3 class="card-title" style="margin-top: 10px">Danh sách bài giới thiệu</h3>
      <div class="float-right">
        <a href="{{ url('admin/about/add-edit') }}" class="btn btn-primary">
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
      <table id="abouts" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th>Tiêu Đề</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($abouts as $about)
            <tr>
              <input type="hidden" class="deleteAbout" value="{{ $about->id }}">
              <td style="">{{ $about->title }}</td>
              <td style="">{{ $about->description }}</td>
              <td style="width: 150px">
                <img src="{{ asset('storage/' . $about->image) }}" alt="" class="w-100">
              </td>
              <td class="line-highlight">
                <a href="{{ url('admin/about/add-edit/' . $about->id) }}" class="btn btn-warning">
                  <i class="fa fa-pen"></i>
                </a>
                <a href="{{ url('admin/about/delete/' . $about->id) }}"
                  class="btn btn-group-sm btn-danger btnDeleteAbout">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Tiêu Đề</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Thao Tác</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection
