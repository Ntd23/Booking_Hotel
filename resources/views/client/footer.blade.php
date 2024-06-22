<section id="footer" class="ftr-heading-o ftr-heading-mgn-1">
  <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
          <h3 class="footer-heading">CONTACT US</h3>
          <ul class="list-unstyled">
            <li><span><i class="fa fa-map-marker"></i></span>29 Land St, Lorem City, CA</li>
            <li><span><i class="fa fa-phone"></i></span>+00 123 4567</li>
            <li><span><i class="fa fa-envelope"></i></span>info@starhotel.com</li>
          </ul>
        </div><!-- end columns -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
          <h3 class="footer-heading">ABOUT US</h3>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
            ullamcorper suscipit.</p>
          <ul class="social-links list-inline list-unstyled">
            <li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
            <li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
            <li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
            <li><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>
            <li><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></li>
          </ul>
        </div><!-- end columns -->

      </div><!-- end row -->
    </div><!-- end container -->
  </div><!-- end footer-top -->

</section><!-- end footer -->


<!-- Page Scripts Starts -->
<script src="{{ asset('client/js/jquery.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('client/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/custom-navigation.js') }}"></script>
<script src="{{ asset('client/js/custom-flex.js') }}"></script>
<script src="{{ asset('client/js/custom-owl.js') }}"></script>
<script src="{{ asset('client/js/custom-date-picker.js') }}"></script>
<script src="{{ asset('client/js/custom-video.js') }}"></script>

{{-- Bootrapt 4 --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
  integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<!-- Page Scripts Ends -->
<script>
  $('.carousel').carousel()
</script>
  {{-- Sweetalert2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- Login & Register Handle --}}
<script>
  $(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        url: '{{ route('login') }}',
        method: 'POST',
        data: formData,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status) {
            window.location.href = response.redirect;
          } else {
            $('#loginError').text(response.message);
          }
        },
        error: function(xhr) {
          $('#errorMessage').text('Thông tin đăng nhập không đúng. Vui lòng thử lại.').removeClass(
            'd-none');
        }
      });

    });
    $('#registerForm').on('submit', function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $('.text-danger').text('');
      $.ajax({
        url: '{{ route('register') }}',
        method: 'POST',
        data: formData,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status) {
            $('#successText').text(response.message);
            $('#successMessage').removeClass('d-none').addClass('show');

            // Xóa form đăng ký sau khi thành công (nếu muốn)
            $('#registerForm')[0].reset();

            // Chuyển hướng sau một khoảng thời gian (nếu muốn)
            setTimeout(function() {
              window.location.href = '/';
            }, 1500); // Chuyển hướng sau 1.5 giây
          } else {
            $('#registerError').text(response.message);
          }
        },
        error: function(xhr) {
          // Hiển thị lỗi nếu có
          var errors = xhr.responseJSON.errors;
          for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
              $('#error-' + key).text(errors[key][0]);
            }
          }
        }
      });
    });
  });
</script>
{{-- Copy to clipboard --}}
<script>
  function copyToClipboard(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand("copy");
  }
</script>
{{-- Calculate the number of days of stay and price --}}
<script>
  function calculateTotal() {
    var check_in_date = document.getElementById('check_in_date').value;
    var check_out_date = document.getElementById('check_out_date').value;
    var room_quantity = document.getElementById('quantity').value;

    // Kiểm tra nếu cả hai ngày đều được chọn và số lượng phòng hợp lệ
    if (check_in_date && check_out_date && room_quantity) {
      // Chuyển đổi ngày đến và ngày đi sang đối tượng Date
      var date1 = new Date(check_in_date);
      var date2 = new Date(check_out_date);

      // Tính số ngày ở
      var time_difference = date2.getTime() - date1.getTime();
      var total_days = Math.ceil(time_difference / (1000 * 3600 * 24));

      // Hiển thị số ngày ở lên giao diện
      document.getElementById('total_days').innerText = total_days;

      // Hiển thị số phòng đã chọn lên giao diện
      document.getElementById('total_rooms').innerText = room_quantity;

      // Tính tổng giá tiền (giá phòng * số ngày ở * số lượng phòng)
      var room_price = {{ $room->price ?? 0 }};
      var total_price = room_price * total_days * room_quantity;

      // Hiển thị tổng giá tiền lên giao diện
      document.getElementById('total_price').innerText = total_price
        .toLocaleString(); // Sử dụng toLocaleString để định dạng số tiền
    } else {
      // Nếu không có đủ cả hai ngày và số lượng phòng, đặt lại số ngày ở, số phòng và giá tiền về 0
      document.getElementById('total_days').innerText = 0;
      document.getElementById('total_rooms').innerText = 1;
      document.getElementById('total_price').innerText = 0;
    }
  }

  // Bắt sự kiện khi thay đổi ngày đến, ngày đi hoặc số lượng phòng
  document.getElementById('check_in_date').addEventListener('change', calculateTotal);
  document.getElementById('check_out_date').addEventListener('change', calculateTotal);
  document.getElementById('quantity').addEventListener('change', calculateTotal);
</script>

{{-- Cancel  Booking --}}
<script>
  $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('.btnCancelBooking').click(function(e) {
        e.preventDefault();
        var cancelBooking = $(this).closest('tr').find('.cancelBooking').val();
        swal({
            title: "Quý khách muốn hủy đặt phòng?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var data = {
                "_token": $('input[name=_token]').val(),
                "id": cancelBooking,
              };
              $.ajax({
                type: "GET",
                url: "booking/cancel/" + cancelBooking,
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
</body>



</html>

