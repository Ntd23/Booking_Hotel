@include('client.header')
@php
  use Carbon\Carbon;
@endphp
<section class="innerpage-wrapper">
  @session('msg')
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
      {{ session('msg') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endsession
  <div id="dashboard" class="innerpage-section-padding">
    <div class="container">
      <div class="row" style="width: 123%;margin-left: -30px;">
        <div class="col-sm-12">
          <div class="page-heading">
            <h2>Danh sách phòng đã đặt</h2>
            <hr class="heading-line" />
          </div>
          <!-- end dashboard-heading -->
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content wishlist">
              <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    @foreach ($bookings as $booking)
                      @php
                        $room = $booking->room;
                        $daysSincePayment = 10;
                        foreach ($booking->payment as $payment) {
                            $daysSincePayment =Carbon::parse($payment->payment_date)->diffInDays(now());
                        }
                      @endphp
                      @if (Carbon::parse($booking->check_out_date)->lessThan(now()))
                      @php
                      $booking->room->update(['quantity'=>$booking->room->quantity+$booking->quantity_rooms_booking]);
                      $booking->delete();
                    @endphp
                      @endif
                      @if (Carbon::parse($booking->check_out_date)->greaterThan(now()))

                      <tr class="list-content">
                        <td class="list-img wishlist-img" style="padding-right: 356px;padding-bottom: 0;">
                          <img src="{{ asset('storage/' . $room->image) }}" class="img-responsive" alt="wishlist-img"
                            style="width: 400px;height: 322px;" />
                        </td>
                        <td class="list-text wishlist-text">
                          <h3>
                            {{ $room->name }}
                          </h3>
                          <h4>Mã đặt phòng: {{ 'NSH' . $booking->id }}</h4>
                          <p>
                            <span>Số người lớn: {{ $room->quantity_adult }}</span>|
                            <span>Số trẻ em: {{ $room->quantity_child }}</span>|
                            <span>Số phòng: {{ $booking->quantity_rooms_booking }}</span><br>
                            <span>Ngày nhận phòng: {{ Carbon::parse($booking->check_in_date)->format('d/m/Y') }}</span>|
                            <span>Ngày trả phòng:
                              {{ Carbon::parse($booking->check_out_date)->format('d/m/Y') }}</span><br>
                          </p>
                          <p class="order mb-0">
                            <span>Thanh toán: {{ number_format($booking->total_price) . ' VND' }}</span>
                          </p>
                          <span>Bạn chỉ có thể hủy đặt phòng trong ngày</span><br>
                          <input type="hidden" name="booking_id" class="cancelBooking"
                          value="{{ $booking->id }}">
                          @if ($booking->payment->isEmpty())
                            <form action="{{ url('/payment') }}" method="POST">
                              @csrf @method('POST')
                              <input type="hidden" name="booking_id" class="cancelBooking"
                              value="{{ $booking->id }}">
                              <input type="hidden" name="room_id" value="{{ $booking->room->id }}">
                              <label for="payment_method">Chọn phương thức thanh toán</label>
                              <select name="payment_method" id="payment_method">
                                <option value="">--Chọn</option>
                                <option value="direct_payment">Thanh toán trực tiếp</option>
                                <option value="online_payment">Thanh toán online</option>
                              </select>
                              @if ($errors->has('payment_method') && old('booking_id') == $booking->id)
                                @error('payment_method')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              @endif
                              @if ($booking->status == 0)
                                {{-- chưa thanh toán --}}
                                <button class="btn btn-orange font-weight-bolder p-2" style="margin-top: 1px;">Thanh
                                  toán</button>
                              @endif
                            </form>
                          @endif
                          @if ($booking->status == 1)
                            {{-- Đã thanh toán  --}}
                            @foreach ($booking->payment as $payment)
                              <span>Ngày thanh toán: {{ $payment->payment_date }}</span>
                            @endforeach
                          @elseif ($booking->status == 2)
                            <span>Đã trả phòng</span>
                          @endif
                        </td>
                        @if ($daysSincePayment <= 1)
                          <td class="wishlist-btn hidden-sm">
                            <a href="{{ url('info/booking/cancel/' . $booking->id) }}"
                              class="btn btn-lightgrey font-weight-bolder btnCancelBooking">Hủy đặt phòng </a>
                          </td>
                        @endif
                      </tr>

                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- end table-responsive -->
            </div>
            <!-- end columns -->
          </div>
          <!-- end row -->
        </div>
        <!-- end dashboard-wrapper -->
        <!-- end columns -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end dashboard -->
</section>
@include('client.footer')
