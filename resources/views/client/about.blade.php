@include('client.header')
<section class="innerpage-wrapper">
  <div id="about-us">

    <div id="about-content" class="section-padding">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                          @foreach ($abouts as $index => $about)
                          <div class="carousel-item @if($index == 0) active @endif">
                              <div class="d-flex align-items-center justify-content-center" style="height: 500px;"> <!-- Đặt chiều cao cố định hoặc tối thiểu cho container -->
                                  <img src="{{ asset('storage/'.$about->image) }}" class="img-responsive w-50" alt="about-img" style="height: 100%; object-fit: cover;" />
                                  <div class="about-text" style="width: 50%; height: 100%; background: #5dabab40; display: flex; align-items: center; justify-content: center;">
                                      <div class="about-detail" style="padding: 20px;">
                                          <h2>{{ $about->title }}</h2>
                                          <h4>{{ $about->description }}</h4>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>


  </div><!-- end about-us -->
</section>
@include('client.footer')
