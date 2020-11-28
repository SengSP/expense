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

      @if($message = Session::get('success'))
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-success" style="">
              <div class="md-toast-message">
                {{ $message }}
              </div>
            </div>
          </div>
        @endif

        @if($message = Session::get('error'))
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                {{ $message }}
              </div>
            </div>
          </div>
        @endif
        <div class="waves-ripple" data-hold="1588692264797" data-x="130.78125" data-y="22.125" data-scale="scale(5.1)" data-translate="translate(0,0)" 
								style="top:22.125px;left:130.78125px;opacity:0;-webkit-transition-duration:750ms;-moz-transition-duration:750ms;-o-transition-duration:750ms;transition-duration:750ms;-webkit-transform:scale(5.1) translate(0,0);-moz-transform:scale(5.1) translate(0,0);-ms-transform:scale(5.1) translate(0,0);-o-transform:scale(5.1) translate(0,0);transform:scale(5.1) translate(0,0);"></div>

      <!-- Section: Intro -->
      <section class="mb-5">

        <div class="card card-cascade narrower">
          <section>
            <div class="row">
              <div class="col-xl-12 col-log-12 mr-0 pb-1">
                <div class="view view-cascade gradient-card-header light-blue lighten-1">
                  <h4 class="h4-responsive mb-0 font-weight-500">{{ $title }}</h4>
                </div>

                <div class="card-body card-body-cascade pb-0">
                  <div class="row">
                    <div class="col-md-3">
                      <select class="mdb-select md-form" name="year" id="year">
                        <option value="" disabled selected>ເລືອກປີ</option>
                        @for ($i = $year; $i <= $year+1; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select class="mdb-select md-form" name="month" id="month">
                        <option value="" disabled selected>ເລືອກເດືອນ</option>
                        @for ($i = 1; $i <= 12; $i++)
                          @if(strlen($i) < 2)
                          <option value="0{{ $i }}">0{{ $i }}</option>
                          @else
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endif
                        @endfor
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select class="mdb-select md-form" name="date" id="date">
                        <option value="" disabled selected>ເລືອກວັນທີ່</option>
                        @for ($i = 1; $i <= (int)$dateselect; $i++)
                          @if(strlen($i) < 2)
                          <option value="0{{ $i }}">0{{ $i }}</option>
                          @else
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endif
                        @endfor
                      </select>
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-primary" type="button" id="btnAddexpense"><i class="fas fa-plus-circle"></i> ເພີ່ມລາຍຈ່າຍໃໝ່</button>
                    </div>
                  </div>
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
                            <th></th>
                          </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody id="showexpense">
                        @if(count($expenses) > 0)
                          @foreach($expenses as $exp)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $exp->listbuy }}</td>
                            <td>{{ $exp->datebuy }}</td>
                            <td>{{ $exp->qty }}</td>
                            <td>{{ number_format($exp->price) }}</td>
                            <td>{{ number_format($exp->total) }}</td>
                            <td>{{ $exp->remark }}</td>
                            <td>
                              <div class="dropleft adropdown">
                                <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu dropdown-primary">
                                  <button class="dropdown-item" type="button" id="btnEditexp" value="{{ $exp->expenseid }}"><i class="fas fa-pen-alt"></i> ແກ້ໄຂຂ້ໍມູນ</button>
                                  <button class="dropdown-item" type="button" id="btnTrashexp" value="{{ $exp->expenseid }}"><i class="fas fa-trash-alt"></i> ລຶບ</button>
                                </div>
                              </div>
                            </td>
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
                      {{ $expenses->render() }}
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>

          {{-- modal add new expense --}}
          <div class="modal fade" id="modaladdexpense" tabindex="-1" role="dialog" aria-labelledby="myModallarbel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-xl" role="document">
              {{-- Content --}}
              <div class="modal-content">
                {{-- tab --}}
                <div class="modal-c-tabs">
                  {{-- Nav tabs --}}
                  <div class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                      <h3 class="text-center text-white">ເພີ່ມລາຍຈ່າຍໃໝ່</h3>
                    </li>
                  </div>
                </div>

                {{-- Tab panels --}}
                <form class="tab-content" action="{{ url('insertexpense') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="tab-pane fade in show active" id="" role="tabpanel">

                    {{-- modal-body --}}
                    <div class="modal-body mb-1">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="md-form">
                            <i class="fas fa-clipboard-list prefix"></i>
                            <input class="form-control" type="text" name="listbuy" id="listbuy" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລາຍການຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="listbuy">ລາຍການ</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input type="text" name="datebuy" id="datebuy" value="{{ date('Y-m-d') }}" class="form-control datepicker" required oninvalid="this.setCustomValidity('ກະລຸນາເລືອກວັນທີ່ຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="datebuy">ເລືອກວັນທີ່</label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="md-form">
                            <i class="fas fa-cart-plus prefix"></i>
                            <input class="form-control" type="number" name="qty" id="qty" value="" maxlength="3" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ຈຳນວນຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="qty">ຈຳນວນ</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="md-form">
                            <i class="far fa-money-bill-alt prefix"></i>
                            <input class="form-control" type="number" name="price" id="price" value="" maxlength="9" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລາຄາຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="price">ລາຄາ</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="md-form md-outline">
                            <i class="fas fa-money-bill-wave prefix"></i>
                            <input class="form-control" type="number" name="total" id="total" value="" required readonly>
                            <label for="total" class="active">ລວມ</label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="md-form md-outline">
                            <i class="fas fa-clipboard-list prefix"></i>
                            <textarea type="text" id="remark" name="remark" class="md-textarea form-control" rows="2"></textarea>
                            <label for="remark">ໝາຍເຫດ</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- modal footer --}}
                    <div class="modal-footer">
                      <button class="btn btn-success" type="submit" name="btnaddnew" id="btnAdd"><i class="fas fa-save"></i> ບັນທຶກ</button>
                      <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal"><i class="fas fa-window-close"></i> ຍົກເລີກ</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- modal edit expense --}}
          <div class="modal fade" id="modaleditexpense" tabindex="-1" role="dialog" aria-labelledby="myModallarbel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-xl" role="document">
              {{-- Content --}}
              <div class="modal-content">
                {{-- tab --}}
                <div class="modal-c-tabs">
                  {{-- Nav tabs --}}
                  <div class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                      <h3 class="text-center text-white">ແກ້ໄຂຂໍ້ມູນຈ່າຍຄືນ</h3>
                    </li>
                  </div>
                </div>

                {{-- Tab panels --}}
                <form class="tab-content" action="{{ url('updatethisdata') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="tab-pane fade in show active" id="" role="tabpanel">

                    {{-- modal-body --}}
                    <div class="modal-body mb-1">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="md-form">
                            <i class="fas fa-clipboard-list prefix"></i>
                            <input type="hidden" name="expenseid" id="expenseid" value="">
                            <input class="form-control" type="text" name="listbuy" id="listbuy1" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລາຍການຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="listbuy">ລາຍການ</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input type="text" name="datebuy" id="datebuy1" value="{{ date('Y-m-d') }}" class="form-control datepicker" required oninvalid="this.setCustomValidity('ກະລຸນາເລືອກວັນທີ່ຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="datebuy">ເລືອກວັນທີ່</label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="md-form">
                            <i class="fas fa-cart-plus prefix"></i>
                            <input class="form-control" type="number" name="qty" id="qty1" value="" maxlength="3" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ຈຳນວນຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="qty">ຈຳນວນ</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="md-form">
                            <i class="far fa-money-bill-alt prefix"></i>
                            <input class="form-control" type="number" name="price" id="price1" value="" maxlength="9" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລາຄາຊື້!')"
                            oninput="this.setCustomValidity('')">
                            <label for="price">ລາຄາ</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="md-form md-outline">
                            <i class="fas fa-money-bill-wave prefix"></i>
                            <input class="form-control" type="number" name="total" id="total1" value="" required readonly>
                            <label for="total" class="active">ລວມ</label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="md-form md-outline">
                            <i class="fas fa-clipboard-list prefix"></i>
                            <textarea type="text" id="remark1" name="remark" class="md-textarea form-control" rows="2"></textarea>
                            <label for="remark">ໝາຍເຫດ</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- modal footer --}}
                    <div class="modal-footer">
                      <button class="btn btn-success" type="submit" name="btnupdate" id="btnUpdate"><i class="fas fa-save"></i> ບັນທຶກ</button>
                      <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal"><i class="fas fa-window-close"></i> ຍົກເລີກ</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- modal delete expense --}}
          <div class="modal fade" id="modaledelexpense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal modal-sm" role="document">
              <!-- Content -->
              <form class="modal-content" action="{{ url('deletedataexp') }}" method="POST">
                {{ csrf_field() }}
                <!-- Modal cascading tabs -->
                <div class="modal-c-tabs">

                  <!-- Nav tabs -->
                  <ul class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                      <h3 class="text-center text-white">ລົບລາຍຈ່າຍ</h3>
                    </li>
                  </ul>

                  <!-- Tab panels -->
                  <div class="tab-content">
                    <div class="tab-pane fade in show active" id="" role="tabpanel">

                      <!-- Body -->
                      <div class="modal-body mb-1">
                        
                        <div class="row">
                          <div class="col-md-12">
                            <h5 class="text-center">
                              ທ່ານຕ້ອງການລຶບຜູ້ໃຊ້ນີ້ແທ້ບໍ່?
                              <br>
                              <b class="text-success">ກົດຕົກລົງ</b> ເພື່ອຢືນຢັນ
                            </h5>
                            <input type="hidden" name="delexpid" id="delexpid" value="">
                          </div>
                        </div>
                        
                      </div>
                      <!-- Footer -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success waves-effect ml-auto"><i class="fas fa-trash-alt"></i> ລົບ</button>
                        <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal"><i class="fas fa-window-close"></i> ຍົກເລີກ</button>
                      </div>

                    </div>
                  </div>

                </div>
              </form>
              <!-- Content -->
            </div>
          </div>

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
  <script src="{{ url('js/expense.js') }}"></script>
  @include('packages.footer')  
@endif
  
@else
  <meta http-equiv="refresh" content="0; url={{ url('/') }}">
@endif