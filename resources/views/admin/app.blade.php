<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang Quản Trị</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  {{-- Mobiscroll --}}
  <link href="{{ asset('select-multiple/css/mobiscroll.javascript.min.css') }}" rel="stylesheet" />
  {{-- MorrisCss --}}
  <script type="text/javascript" src="https://yourweb.com/inc/chart.utils.js"></script>
  {{-- <script src="{{ asset('plugins/utils.js') }}" type="module"></script> --}}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
    </div>


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              @if (Session::get('page') == 'revenue')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('admin') }}" class="nav-link {{ $active }}">
                <p>
                  Thống Kê
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'room')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('rooms') }}" class="nav-link {{ $active }}">
                <p>
                  Phòng
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'booking')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('bookings') }}" class="nav-link {{ $active }}">
                <p>
                  Đặt Phòng
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'amenity')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('amenities') }}" class="nav-link {{ $active }}">
                <p>
                  Tiện Nghi
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'promotion')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('promotions') }}" class="nav-link {{ $active }}">
                <p>
                  Khuyến Mãi
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'contact')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('contacts') }}" class="nav-link {{ $active }}">
                <p>
                  Liên Hệ
                </p>
              </a>
            </li>
            <li class="nav-item">
              @if (Session::get('page') == 'about')
                @php
                  $active = 'active';
                @endphp
              @else
                @php
                  $active = '';
                @endphp
              @endif
              <a href="{{ route('abouts') }}" class="nav-link {{ $active }}">
                <p>
                  About
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <a class="navbar-brand" href="{{ url('http://127.0.0.1:8000') }}">
                <h2 id="web-name"><span><i class="fa fa-building"></i></span>Night Star Hotel</h2>
              </a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ul class="float-sm-right list-unstyled d-flex align-items-center">
                <li class="" style="margin-right: 50px">Hi, <span class="font-italic font-weight-bolder ml-1">
                    {{ Auth::user()->name }}</span></li>
                <li class="active">
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-danger"><i class="fa fa-power-off"></i></button>
                  </form>
                </li>
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              @yield('content')

            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  {{-- Bootstrap --}}
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>

  <!-- OPTIONAL SCRIPTS -->
  {{-- <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  {{-- DataTables --}}
  <script src="{{ url('plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  {{-- Sweetalert2 --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(function() {
      $("#rooms").DataTable();
      $("#amenities").DataTable();
      $("#promotions").DataTable();
      $("#contacts").DataTable();
      $("#abouts").DataTable();
      $("#bookings").DataTable();
    })
  </script>
  {{-- Preview Image --}}
  <script>
    function previewImage(event) {
      var input = event.target;
      var reader = new FileReader();

      reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById('preview-image');
        output.src = dataURL;
        output.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    }
  </script>
  {{-- Preview Video --}}
  <script>
    function previewVideo(event) {
      var input = event.target;
      var reader = new FileReader();

      reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById('preview-video');
        output.src = dataURL;
        output.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    }
  </script>
  {{-- Delete Room --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnDeleteRoom').click(function(e) {
        e.preventDefault();
        var deleteRoom = $(this).closest('tr').find('.deleteRoom').val();
        swal({
            title: "Bạn có chắc xóa bản ghi này?",
            text: "Sau khi xóa không thể khôi phục!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": deleteRoom,
              };
              $.ajax({
                type: "GET",
                url: "room/delete/" + deleteRoom,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    })
                },
                error: function(err) {
                  console.log(err);
                }
              })
            }
          });
      });
    });
  </script>
  {{-- Delete Amenity --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnDeleteAmenity').click(function(e) {
        e.preventDefault();
        var deleteAmenity = $(this).closest('tr').find('.deleteAmenity').val();
        swal({
            title: "Bạn có chắc xóa bản ghi này?",
            text: "Sau khi xóa không thể khôi phục!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": deleteAmenity,
              };
              $.ajax({
                type: "GET",
                url: "amenity/delete/" + deleteAmenity,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    })
                },
              })
            }
          });
      });
    });
  </script>
  {{-- Delete Promotion --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnDeletePromotion').click(function(e) {
        e.preventDefault();
        var deletePromotion = $(this).closest('tr').find('.deletePromotion').val();
        swal({
            title: "Bạn có chắc xóa bản ghi này?",
            text: "Sau khi xóa không thể khôi phục!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": deletePromotion,
              };
              $.ajax({
                type: "GET",
                url: "promotion/delete/" + deletePromotion,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    })
                },
              })
            }
          });
      });
    });
  </script>
  {{-- Delete Contact --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnDeleteContact').click(function(e) {
        e.preventDefault();
        var deleteContact = $(this).closest('tr').find('.deleteContact').val();
        swal({
            title: "Bạn có chắc xóa bản ghi này?",
            text: "Sau khi xóa không thể khôi phục!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": deleteContact,
              };
              $.ajax({
                type: "GET",
                url: "contact/delete/" + deleteContact,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    })
                },
              })
            }
          });
      });
    });
  </script>
  {{-- Delete About --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnDeleteAbout').click(function(e) {
        e.preventDefault();
        var deleteAbout = $(this).closest('tr').find('.deleteAbout').val();
        swal({
            title: "Bạn có chắc xóa bản ghi này?",
            text: "Sau khi xóa không thể khôi phục!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": deleteAbout,
              };
              $.ajax({
                type: "GET",
                url: "about/delete/" + deleteAbout,
                data: data,
                success: function(response) {
                  swal(response.status, {
                      icon: "success",
                    })
                    .then((result) => {
                      location.reload();
                    })
                },
              })
            }
          });
      });
    });
  </script>
  {{-- Mobiscroll --}}
  {{-- <script src="{{ asset('select-multiple/js/mobiscroll.javascript.min.js') }}"></script>
  <script>
    mobiscroll.select('#multiple-select', {
    inputElement: document.getElementById('my-input'),
    touchUi: false
})
  </script> --}}
  {{-- Update Contact Status --}}
  <script>
    $(document).ready(function() {
      $(document).on("click", ".updateContactStatus", function() {
        var status = $(this).children("span").attr("status");
        var contact_id = $(this).attr("contact_id");
        $.ajax({
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          type: "post",
          url: "/admin/contact/update-contact-status",
          data: {
            status: status,
            contact_id: contact_id,
          },
          success: function(response) {
            if (response["status"] == 0) {
              $("#contact-" + contact_id).html(
                "<span class='btn btn-sm btn-secondary' aria-hidden='true' status='Đã gọi'>Đã gọi</span>"
              );
            } else if (response["status"] == 1) {
              $("#contact-" + contact_id).html(
                "<span class='btn btn-sm btn-warning' aria-hidden='true' status='Chưa gọi'>Chưa gọi</span>"
              );
            }
          },
          error: function(err) {
            console.log(err);
          }
        });
      })
    })
  </script>
  {{-- Revenue --}}
  <script>

  </script>
</body>

</html>
