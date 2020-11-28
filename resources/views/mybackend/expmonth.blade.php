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
                <h4 class="h4-responsive mb-0 font-weight-500">{{ $title }}</h4>
              </div>

              <div class="card-body card-body-cascade pb-0">
                <div class="row">
                  <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-striped">

                      <!-- Table head -->
                      <thead class="mdb-color darken-3">
                        <tr class="text-white">
                          <th>ລຳດັບ</th>
                          <th>ລາຍການຊື້</th>
                          <th>ວັນທີ່ຊື້</th>
                          <th>ຈຳນວນ</th>
                          <th>ລາຄາ</th>
                          <th>ລວມ</th>
                          <th>ໝາຍເຫດ</th>
                        </tr>
                      </thead>
                      <!-- Table head -->

                      <!-- Table body -->
                      <tbody id="showexpense">
                      @if(count($expthismonth) > 0)
                        @foreach($expthismonth as $exp)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $exp->listbuy }}</td>
                          <td>{{ $exp->datebuy }}</td>
                          <td>{{ $exp->qty }}</td>
                          <td>{{ number_format($exp->price) }}</td>
                          <td>{{ number_format($exp->total) }}</td>
                          <td>{{ $exp->remark }}</td>
                        </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="8" class="text-center text-danger">ຍັງບໍ່ມີການບັນທຶກຂໍ້ມູນລາຍຈ່າຍ</td>
                        </tr>
                      @endif
                      </tbody>
                      <!-- Table body -->

                      {{-- Table footer --}}
                      <tfoot>
                        <tr>
                          <td colspan="" class="text-right">ລາຍການທັງໝົດ:</td>
                          <td><b id="showcountrow">{{$count}}</b> ລາຍການ</td>
                          <td></td>
                          <td colspan="2" class="text-right">ລວມລາຄາ:</td>
                          <td colspan="3"><b id="showtotal">{{ number_format($showtotal) }}</b> ກີບ</td>
                        </tr>
                      </tfoot>
                      {{-- Table footer --}}
                    </table>
                    <!-- Table -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-center">
                    {{ $expthismonth->render() }}
                  </div>
                </div>
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