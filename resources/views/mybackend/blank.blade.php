@if(Auth::user()->email && Auth::user()->password)

@if(Auth::user()->status == "block")
  <meta http-equiv="refresh" content="0; url={{ url('reportblock') }}">
@else

@include('packages.header')

@include('packages.sidebar')

@include('packages.nav')

   <!-- Main layout -->
<main>

  <div class="container-fluid">

      <!-- Section: Intro -->
    <section class="mb-5">

      <div class="card card-cascade narrower">
        <section>
          <div class="row">
            <div class="col-xl-12 col-log-12 mr-0 pb-2">
              <div class="view view-cascade gradient-card-header light-blue lighten-1">
                <h4 class="h4-responsive mb-0 font-weight-500">ຫົວຂໍ້</h4>
              </div>

              <div class="card-body card-body-cascade pb-0">
              
              </div>

            </div>
          </div>
        </section>
      </div>

    </section>

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
  
  @include('packages.footer')

  @endif
  
  @else
    <meta http-equiv="refresh" content="0; url={{ url('/') }}">
  @endif