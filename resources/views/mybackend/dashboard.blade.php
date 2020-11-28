@if(isset(Auth::user()->email) && isset(Auth::user()->password))

@if(Auth::user()->status == "public")
  
@include('packages.header')

@include('packages.sidebar')

@include('packages.nav')

  <!-- Main layout -->
  <main>
    @if($message = Session::get('success'))
      <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
        <div class="md-toast md-toast-success" style="">
          <div class="md-toast-message">
            {{ $message }}
          </div>
        </div>
      </div>
    @endif
    @error('fimage')
        <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
          <div class="md-toast md-toast-danger" style="">
            <div class="md-toast-message">
              ຊະນິດຮູບພາບຂອງທ່ານບໍ່ມີນາມສະກຸນເປັນ: jpeg,png,jpg,gif,svg
            </div>
          </div>
        </div>
      @enderror
    <div class="waves-ripple" data-hold="1588692264797" data-x="130.78125" data-y="22.125" data-scale="scale(5.1)" data-translate="translate(0,0)" 
								style="top:22.125px;left:130.78125px;opacity:0;-webkit-transition-duration:750ms;-moz-transition-duration:750ms;-o-transition-duration:750ms;transition-duration:750ms;-webkit-transform:scale(5.1) translate(0,0);-moz-transform:scale(5.1) translate(0,0);-ms-transform:scale(5.1) translate(0,0);-o-transform:scale(5.1) translate(0,0);transform:scale(5.1) translate(0,0);"></div>

    <div class="container-fluid">

      <!-- Section: Intro -->
      <section class="mt-md-4 pt-md-2 mb-5 pb-4">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <a class="card card-cascade cascading-admin-card" href="{{ url('buying') }}">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">ໃຊ້ຈ່າຍມື້ນີ້</p>
                  <h5 class="font-weight-bold dark-grey-text"><b>{{ $exptoday }}</b> ກີບ</h5>
                </div>
              </div>

              <!-- Card content -->
              {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">ເງິນໃຊ້ມື້ນີ້ຄິດເປັນເປີເຊັນ <b id="daypercent">(25%)</b></p>
              </div> --}}

            </a>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <a class="card card-cascade cascading-admin-card" href="{{ url('expthisweek') }}">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-money-bill-alt warning-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">ໃຊ້ຈ່າຍອາທິດນີ້</p>
                  <h5 class="font-weight-bold dark-grey-text"><b>{{ $expthisweek }}</b> ກີບ</h5>
                </div>
              </div>

              <!-- Card content -->
              {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">ເງິນໃຊ້ອາທິດນີ້ຄິດເປັນເປີເຊັນ <b id="weekpercent">(25%)</b></p>
              </div> --}}

            </a>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card -->
            <a class="card card-cascade cascading-admin-card" href="{{ url('expmonth') }}">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-money-bill-alt light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">ໃຊ້ຈ່າຍເດືອນນີ້</p>
                  <h5 class="font-weight-bold dark-grey-text">{{ $expthismonth }} ກີບ</h5>
                </div>
              </div>

              <!-- Card content -->
              {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">ເງິນໃຊ້ເດ (75%)</p>
              </div> --}}

            </a>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-money-bill-alt red accent-2 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">ປີນີ້</p>
                  <h5 class="font-weight-bold dark-grey-text">{{ $expthisyear }} ກີບ</h5>
                </div>
              </div>

              <!-- Card content -->
              {{-- <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Better than last week (25%)</p>
              </div> --}}

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Intro -->

      <!-- Section: Main panel -->
      <section class="mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

          <!-- Section: Chart -->
          <section>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-xl-12 col-lg-12 mb-4 pb-2">

                <!-- Chart -->
                <div class="view view-cascade gradient-card-header blue-gradient">

                  <canvas id="lineChart" height="175"></canvas>

                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Chart -->

        </div>
        <!-- Card -->

      </section>
      <!-- Section: Main panel -->

    </div>

  </main>
  <!-- Main layout -->

  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5 rgba-stylish-light fixed-bottom">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a href="#" target="_blank"> Sengsoulisay </a>
      </div>
    </div>

  </footer>
  <!-- Footer -->

  <!-- SCRIPTS -->
  @include('packages.scriptjs')
  
  <script src="{{ url('js/dashboard.js') }}"></script>

@include('packages.footer')

@else

<meta http-equiv="refresh" content="0; url={{ url('reportblock') }}">

@endif

@else
  <meta http-equiv="refresh" content="0; url={{ url('/') }}">
@endif