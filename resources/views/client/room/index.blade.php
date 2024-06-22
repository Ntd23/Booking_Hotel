@include('client.header')
<section id="cruise-offers" class="section-padding" style="padding-top: 0px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-heading">
          <h2>Tất cả các phòng sẵn có</h2>
          <hr class="heading-line" />
        </div><!-- end page-heading -->

        <div class="row">
          @foreach ($rooms as $room)
          <div class="col-sm-6 col-md-6">
            <div class="main-block cruise-block">
              <div class="row">
                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                  <div class="main-img cruise-img">
                    <a href="{{ route('room_details',$room->id) }}">
                      <img src="{{ asset('storage/'.$room->image) }}" class="img-responsive" alt="cruise-img" style="height: 235px" />
                    </a>
                  </div><!-- end cruise-img -->
                </div><!-- end columns -->

                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                  <div class=" main-info cruise-info" style="height: 235px">
                    <div class="main-title cruise-title">
                      <a href="{{ route('room_details',$room->id) }}">{{ $room->name }}</a>
                      <div style="margin-top: 20px">
                        <span class="cruise-price">{{ number_format( $room->price ) }}</span> <span class="pkg" style="top: 0; margin-left: 6px;">VND /
                          đêm</span>
                      </div>
                    </div><!-- end cruise-title -->
                    <h4 style="margin-top: 60px"><a href="{{ route('room_details',$room->id) }}">Đặt Phòng</a></h4>
                  </div><!-- end cruise-info -->
                </div><!-- end columns -->

              </div><!-- end row -->
            </div><!-- end cruise-block -->
          </div><!-- end columns -->
          @endforeach

        </div><!-- end columns -->
      </div><!-- end row -->
    </div><!-- end container -->
</section>

@include('client.footer')

