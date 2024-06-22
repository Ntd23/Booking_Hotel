@include('client.header')
<section class="innerpage-wrapper">
  <div id="hotel-details" class="innerpage-section-padding" style="padding-bottom: 300px; padding-top: 50px;">
    <div class="container">
      <div class="row" style="height: 560px">

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side" style="height: 100%; padding-right: 0;">

          <div class="detail-slider" style="height: 100%;width: 800px;">
            <div class="feature-slider" style="height: 100%">
              <div style="height: 100%"><img src="{{ asset('storage/' . $room->image) }}" width="90%"
                  style="height: 100%" class="img-responsive" alt="feature-img" /></div>
            </div>

          </div> <!-- end detail-slider -->

        </div><!-- end columns -->

        <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">

          <div class="side-bar-block booking-form-block" style="width: 352px;margin-left: -113px;">
            <h2 class="selected-price">{{ number_format($room->price) }} <span class="pkg"
                style="top: 0; margin-left: 6px;">VND /
                đêm</span></h2>
            <div class="modal fade" id="bookingLoginModal" tabindex="-1" aria-labelledby="bookingLoginModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="bookingLoginModalLabel">Bạn phải đăng nhập!!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="booking-form" style="width: 280px;">
              <h4>{{ $room->name }}</h4>
              <form style="width: 302px;"
                @if (!Auth::check()) data-toggle="modal" data-target="#bookingLoginModal"  @else method="POST" action="{{ url('/booking') }}" @endif>
                @if (Auth::check())
                  @csrf @method('POST')
                @endif
                <input type="hidden" name="user_id" value="@if (Auth::check()) {{ Auth::user()->id }} @endif">
                <input type="hidden" name="room_id" value="@if (!empty($room)) {{ $room->id }} @endif">
                <div class="form-group">
                  <input type="text" class="form-control" name="name"
                    value="@if (!empty(Auth::user()->name)) {{ Auth::user()->name }} @endif" readonly />
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" name="email"
                    value="@if (!empty(Auth::user()->email)) {{ Auth::user()->email }} @endif" readonly />
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="phone"
                    value="@if (!empty(Auth::user()->phone)) {{ Auth::user()->phone }} @endif" readonly />
                </div>

                <div class="form-group">
                  <label for="check_in_date">Ngày nhận phòng</label>
                  <input type="date" class="form-control check_in_date" id="check_in_date"
                    name="check_in_date" /></i>
                    @error('check_in_date')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="check_out_date">Ngày trả phòng</label>
                  <input type="date" class="form-control check_out_date" id="check_out_date"
                    name="check_out_date" /></i>
                    @error('check_out_date')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                  <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                    <div class="form-group right-icon">
                      <label for="">Người Lớn</label>
                      <select class="form-control" name="quantity_adult">
                        <option value="{{ $room->quantity_adult }}" selected>|--------{{ $room->quantity_adult }}
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">
                    <div class="form-group right-icon">
                      <label for="">Trẻ Em</label>
                      <select class="form-control" name="quantity_child">
                        <option value="{{ $room->quantity_child }}" selected>|--------{{ $room->quantity_child }}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-12 col-lg-12 no-sp-r">
                    <div class="form-group right-icon">
                      <label for="">Phòng</label>
                      <select class="form-control" name="quantity" id="quantity">
                        @for ($i = 1; $i <= $room->quantity; $i++)
                          <option value="{{ $i }}">|--------{{ $i }}</option>
                        @endfor
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="total_days">Số ngày:</label>
                  <span id="total_days">0</span>
                </div>
                <div class="form-group">
                  <label for="total_rooms">Số phòng:</label>
                  <span id="total_rooms">1</span>
                </div>
                <div class="form-group">
                  <label for="total_price">Tổng giá tiền:</label>
                  <span id="total_price">0</span> VNĐ
                </div>
                <button class="btn btn-block btn-orange">Booking Now</button>
              </form>

            </div><!-- end booking-form -->
          </div><!-- end side-bar-block -->


        </div><!-- end columns -->

      </div><!-- end row -->
    </div><!-- end container -->
  </div><!-- end hotel-details -->
</section><!-- end innerpage-wrapper -->

@include('client.footer')
