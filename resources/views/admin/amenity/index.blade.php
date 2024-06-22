@extends('admin.app')

@section('content')

<div class="card dark-mode">
  <div class="card-header">
    <h3 class="card-title" style="margin-top: 10px">Danh sách dịch vụ</h3>
    <div class="float-right">
      <a href="{{ url('admin/amenity/add-edit') }}" class="btn btn-primary">
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
    <table id="amenities" class="hover row-border" style="width:100%">
      <thead>
        <tr>
          <th>Icon</th>
          <th style="padding-left: 30px">Tiện Nghi</th>
          <th style="width: 200px">Mô Tả</th>
          <th style="padding-left: 30px">Giá</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($amenities as $amenity)
        <tr>
          <input type="hidden" class="deleteAmenity" value="{{ $amenity->id }}">
          <td style="width: 150px">
            <img src="{{ asset('storage/'.$amenity->icon) }}" alt="" class="w-50">
          </td>
          <td style="padding-left: 30px">{{ $amenity->name }}</td>
          <td style="width: 200px">{{ substr($amenity->description, 0, 100).'...' }}</td>
          <td style="padding-left: 30px">{{ $amenity->price }} VND</td>
          <td class="line-highlight">
            <a href="{{ url('admin/amenity/add-edit/' . $amenity->id) }}" class="btn btn-warning">
              <i class="fa fa-pen"></i>
            </a>
            <a href="{{ url('admin/amenity/delete/'.$amenity->id) }}" class="btn btn-group-sm btn-danger btnDeleteAmenity">
                <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Icon</th>
          <th style="padding-left: 30px">Tiện Nghi</th>
          <th style="width: 200px">Mô Tả</th>
          <th style="padding-left: 30px">Giá</th>
          <th>Thao Tác</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection
