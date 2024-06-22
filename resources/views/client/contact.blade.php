@include('client.header')
<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper" style="margin-top: -50px">
  <div id="contact-us" style="padding: 70px 0px">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-5 no-pd-r">
          <div class="custom-form contact-form">
            <h3>NightStar</h3>
            <h5>Hotline: <p>(+84) 934 123 123</p>
            </h5>
            <h5>Email: <p>nightstar@gmail.com</p>
            </h5>
            <h5>Address: <p>Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội, Việt Nam</p>
            </h5>
            @if (session('success'))
            <div class="alert alert-success mt-3">
              {{ session('success') }}
            </div>
            @endif
            <div class="modal fade" id="contactLoginModal" tabindex="-1" aria-labelledby="contactLoginModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="contactLoginModalLabel">Bạn phải đăng nhập!!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <form  @if (!Auth::check()) data-toggle="modal" data-target="#contactLoginModal" @else method="POST" action="{{ url('contact-send') }}" @endif>
              @if (Auth::check())
              @csrf @method('POST')
              @endif
              <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::id() : '' }}">
              <div class="form-group">
                <input type="text" class="form-control" name="name" @if (!empty($user)) value="{{ $user->name }}" @else
                  placeholder="Họ tên" @endif />
                <span><i class="fa fa-user"></i></span>
              </div>

              <div class="form-group">
                <input type="email" class="form-control" name="email" @if (!empty($user)) value="{{ $user->email }}"
                  @else placeholder="Email" @endif />
                <span><i class="fa fa-envelope"></i></span>
              </div>

              <div class="form-group">
                <textarea class="form-control" rows="4" placeholder="Nội dung" name="content"></textarea>
                <span><i class="fa fa-pencil"></i></span>
              </div>

              <button class="btn btn-orange btn-block">Send</button>
            </form>
          </div><!-- end contact-form -->
        </div><!-- end columns -->

        <div class="col-sm-12 col-md-7 no-pd-l">
          <div class="map" style="height: 632px;">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.473663213007!2d105.73253187408294!3d21.053735986922593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1718019974878!5m2!1svi!2s"
              style="border:0; height: 632px; max-height: 650px" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- end columns -->

        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end contact-us -->
  </div>
</section><!-- end innerpage-wrapper -->
@include('client.footer')
