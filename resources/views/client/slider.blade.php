<section class="flexslider-container" id="flexslider-container-1">

  <div class="flexslider slider" id="slider-1">
    <ul class="slides">
      <li class="item-1"
        style="width: 100%; height: 515px ;background-size: cover; background-position: center ;background-image: url('http://127.0.0.1:8000/storage/3.jpg')">
      </li>
      <li class="item-2"
        style="width: 100%; height: 515px ;background-size: cover; background-position: center ;background-image: url('http://127.0.0.1:8000/storage/1.jpg')">
      </li>
      <li class="item-3"
        style="width: 100%; height: 515px ;background-size: cover; background-position: center ;background-image: url('http://127.0.0.1:8000/storage/2.jpg')">
      </li>
    </ul>
  </div><!-- end slider -->

  <div class="search-tabs" style="bottom: 200px" id="search-tabs-1">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="modal fade" id="findRoomLoginModal" tabindex="-1" aria-labelledby="findRoomLoginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="findRoomLoginModalLabel">Bạn phải đăng nhập!!!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane">
            {{-- <div id="hotels" class="tab-pane"> --}}
            <form method="GET"
              @if (!Auth::check()) data-toggle="modal" data-target="#findRoomLoginModal"  @else method="POST" action="{{ url('find-room') }}" @endif>
              @if (Auth::check())
                @csrf @method('POST')
              @endif
              <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                  <div class="row">

                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="">
                          <p style="color: white; margin: 0 0 0; font-size: medium; font-weight: bold">NGÀY NHẬN PHÒNG</p>
                        </label>
                        <input type="date" class="form-control dpd-1" name="checkin_date">
                      </div>
                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="">
                          <p style="color: white; margin: 0 0 0; font-size: medium; font-weight: bold">NGÀY TRẢ PHÒNG</p>
                        </label>
                        <input type="date" class="form-control dpd-2" name="checkout_date">
                      </div>
                    </div><!-- end columns -->

                  </div><!-- end row -->
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <label for="">
                          <p style="color: white; margin: 0 0 0; font-size: medium; font-weight: bold">PHÒNG</p>
                        </label>
                        <select class="form-control" name="quantity">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </div>
                    </div><!-- end columns -->

                    <div class="col-xs-6 col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="">
                          <p style="color: white; margin: 0 0 0; font-size: medium; font-weight: bold">NGƯỜI LỚN</p>
                        </label>
                        <select class="form-control" name="quantity_adult">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                        @error('quantity_adult')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div><!-- end columns -->

                    <div class="col-xs-6 col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="">
                          <p style="color: white; margin: 0 0 0; font-size: medium; font-weight: bold">TRẺ EM</p>
                        </label>
                        <select class="form-control" name="quantity_child">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                        @error('quantity_child')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div><!-- end columns -->

                  </div><!-- end row -->
                </div><!-- end columns -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn" style="margin-top: 35px">
                  <button type="submit" class="btn btn-orange">TÌM PHÒNG</button>
                </div><!-- end columns -->

              </div><!-- end row -->
            </form>
            {{--
            </div><!-- end hotels --> --}}
          </div><!-- end tab-content -->

        </div><!-- end columns -->
      </div><!-- end row -->
    </div><!-- end container -->
  </div><!-- end search-tabs -->

</section><!-- end flexslider-container -->


<!--=============== HOTEL OFFERS ===============-->
<section id="hotel-offers" class="section-padding" style="padding: 0; top:-90px">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-heading">
          <h2>Những căn phòng nổi bật được đề xuất cho quý khách:</h2>
          <hr class="heading-line" />
        </div><!-- end page-heading -->

        <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
          @foreach ($rooms as $room)
            <div class="item" style="height: 340px">
              <div class="main-block hotel-block">
                <div class="main-img">
                  <a href="{{ route('room_details', $room->id) }}">
                    <img src="{{ asset('storage/' . $room->image) }}" class="img-responsive" style="height: 216px"
                      alt="hotel-img" />
                  </a>
                  <div class="main-mask">
                    <ul class="list-unstyled list-inline offer-price-1">
                      <li class="price">{{ number_format($room->price) }}<span class="pkg"
                          style="top: 0; margin-left: 6px;">VND / đêm</span>
                      </li>
                    </ul>
                  </div><!-- end main-mask -->
                </div><!-- end offer-img -->

                <div class="main-info hotel-info">
                  <div class="arrow">
                    <a href="{{ route('room_details', $room->id) }}"><span><i
                          class="fa fa-angle-right"></i></span></a>
                  </div><!-- end arrow -->

                  <div class="main-title hotel-title" style="height: 68px">
                    <a href="{{ route('room_details', $room->id) }}">{{ $room->name }}</a>
                  </div><!-- end hotel-title -->
                </div><!-- end hotel-info -->
              </div><!-- end hotel-block -->
            </div><!-- end item -->
          @endforeach



        </div><!-- end owl-hotel-offers -->

        <div class="text-center">
          <a href="{{ url('/rooms') }}" class="btn btn-lg btn-orange" style="width: 150px">View All</a>
        </div><!-- end view-all -->
      </div><!-- end columns -->
    </div><!-- end row -->
  </div><!-- end container -->
</section><!-- end hotel-offers -->
{{-- Amenities --}}
<section id="hotel-offers" class="section-padding" style="padding: 0; top:0">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-heading">
          <h2>Tiện ích tại khách sạn chúng tôi:</h2>
          <hr class="heading-line" />
        </div>
        <div class="container" style="display: flex; ">
          <div class="row">
            @foreach ($amenities as $amenity)
              <div class="col-md-4" style="margin-bottom: 8px;">
                <div class="card rounded-circle align-items-center" style="height: 240px;">
                  <img src="{{ asset('storage/' . $amenity->icon) }}" class="card-img" alt="..."
                    style="width: 130px; height: 90px;margin-top: 36px">
                  <div class="card-body">
                    <h3 style="font-size: 1.25rem; font-weight: bold">{{ $amenity->name }}</h5>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
