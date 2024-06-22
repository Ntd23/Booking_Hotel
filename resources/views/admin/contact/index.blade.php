@extends('admin.app')

@section('content')

<div class="card dark-mode">
  <div class="card-header">
    <h3 class="card-title" style="margin-top: 10px">Danh sách liên hệ</h3>
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
    <table id="contacts" class="hover row-border" style="width:100%">
      <thead>
        <tr>
          <th>Tên khách hàng</th>
          <th style="padding-left: 30px">Email</th>
          <th style="width: 200px">Lời Nhắn</th>
          <th style="padding-left: 30px">Trạng Thái</th>
          <th>Thao Tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <input type="hidden" class="deleteContact" value="{{ $contact->id }}">
          <td style="padding-left: 30px">{{ $contact->user->name }}</td>
          <td style="padding-left: 30px">{{ $contact->user->email }}</td>
          <td style="padding-left: 30px">{{ $contact->content }}</td>
          <td style="width: 200px; padding-left: 32px;">
            @if ($contact->status==1)
            <a href="javascript:void(0)" id="contact-{{ $contact->id }}" contact_id="{{ $contact->id }}"
              style="color: #3f6ed3" class="updateContactStatus">
              <span class="btn btn-sm btn-warning" status="Chưa gọi">Chưa gọi</span>
            </a>
            @else
            <a href="javascript:void(0)" id="contact-{{ $contact->id }}" contact_id="{{ $contact->id }}"
              style="color: #3f6ed3" class="updateContactStatus">
              <span class="btn btn-sm btn-secondary" status="Đã gọi">Đã gọi</span>
            </a>
            @endif
          </td>

          <td class="line-highlight">
            <a href="{{ url('admin/contact/delete/'.$contact->id) }}"
              class="btn btn-group-sm btn-danger btnDeleteContact">
              <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Tên khách hàng</th>
          <th style="padding-left: 30px">Email</th>
          <th style="width: 200px">Lời Nhắn</th>
          <th style="padding-left: 30px">Trạng Thái</th>
          <th>Thao Tác</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection
