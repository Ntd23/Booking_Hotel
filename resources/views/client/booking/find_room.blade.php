@include('client.header')

<section class="innerpage-wrapper" style="padding-top: 50px;">
  <div id="dashboard" class="innerpage-section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="dashboard-heading">
            <p style="margin-bottom: 10px;">Kết quả: Còn {{ $rooms->count() }} phòng</p>
            <hr class="heading-line" style="margin-bottom: 20px;">
          </div><!-- end dashboard-heading -->

          <div class="dashboard-wrapper">
            <div class="row">
              @foreach ($rooms as $room)
                <div class="col-xs-12 col-sm-6 col-md-4 mb-4" style="margin-bottom: 20px;">
                  <div class="card h-100" style="border: 2px solid orange;">
                    <div class="row no-gutters">
                      <div class="col-md-12">
                        <img class="room-img" src="{{ asset('storage/' . $room->image) }}" alt="Room Image"
                          style="width: 100%; height: 300px; object-fit: cover;">
                      </div>
                      <div class="col-md-12" style="width: 100%; margin-left: auto; margin-right: auto;">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 24px; font-weight: bold; margin-bottom: 10px;">
                            {{ $room->name }}</h5>
                          <p class="card-text" style="margin-bottom: 5px;">Người Lớn: {{ $room->quantity_adult }}</p>
                          <p class="card-text" style="margin-bottom: 5px;">Trẻ Em: {{ $room->quantity_child }}</p>
                          <p class="card-text" style="margin-bottom: 10px;">Giá: {{ $room->price }}/đêm</p>
                          <a href="{{url('/booking/'.$room->id) }}" class="btn btn-orange"
                            style="padding: 10px 20px;margin-left: 184px;">BOOK NOW</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div><!-- end row -->
          </div><!-- end dashboard-wrapper -->
        </div><!-- end columns -->
      </div><!-- end row -->
    </div><!-- end container -->
  </div><!-- end dashboard -->
</section>






@include('client.footer')
