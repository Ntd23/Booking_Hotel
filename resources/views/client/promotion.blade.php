@include('client.header')
<section id="destinations" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-heading">
          <h2>Nhanh tay lấy mã khuyến mãi</h2>
          <hr class="heading-line" />
        </div><!-- end page-heading -->
        <div class="row" style="height: 377px">
          @foreach ($promotions as $promotion)
            <div class="col-sm-6 col-md-3" style="height: 100%;">
              <div class="main-block destination-block" style="height: 100%;">
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                    <div class="destination-info">
                      <div class="destination-title">
                        <h2 style="width: 200px;">{{ $promotion->name }}</h2>
                        <span class="destination-price"
                          style="width: 230px; text-align: left;margin-left: 34px;">{{ $promotion->title }}</span>
                        <h4 style="max-width: 300px;width: 232px;text-align: left;margin: 12px 0;">
                          {{ $promotion->description }}</h4>
                          <p style="width: 226px; text-align: right">
                            <span> Ngày kết thúc: {{ $promotion->end_date }}</span>
                          </p>
                          <div class="row mt-4" style="width: 255px">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="copyInput-{{ $promotion->id }}" value="{{ $promotion->code }}" />
                                    <div class="input-group-append" style="background: rgb(122, 122, 223); height: 38px;">
                                        <button class="btn btn-outline-secondary" style="padding: 0 20px; margin: 0;line-height: 41px" type="button" onclick="copyToClipboard('copyInput-{{ $promotion->id }}')">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div><!-- end destination-title -->
                    </div><!-- end destination-info -->
                  </div><!-- end columns -->
                </div><!-- end row -->
              </div><!-- end destination-block -->
            </div><!-- end columns -->
          @endforeach
        </div><!-- end row -->
      </div><!-- end columns -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>

@include('client.footer')
