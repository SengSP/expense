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

        @error('fimage')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ກະລຸນາເລືອກຮູບພາບໂປຣໄຟລ໌!
              </div>
            </div>
          </div>
        @enderror
        @error('Add')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ທ່ານຍັງບໍ່ໄດ້ເລືອກສິດທິເພີ່ມໃຫ້ຜູ້ໃຊ້!
              </div>
            </div>
          </div>
        @enderror
        @error('Edit')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ທ່ານຍັງບໍ່ໄດ້ເລືອກສິດທິແກ້ໄຂໃຫ້ຜູ້ໃຊ້!
              </div>
            </div>
          </div>
        @enderror
        @error('Delete')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ທ່ານຍັງບໍ່ໄດ້ເລືອກສິດທິລົບໃຫ້ຜູ້ໃຊ້!
              </div>
            </div>
          </div>
        @enderror
        @error('View')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ທ່ານຍັງບໍ່ໄດ້ເລືອກສິດທິເບິ່ງໃຫ້ຜູ້ໃຊ້!
              </div>
            </div>
          </div>
        @enderror
        @error('name')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້!
              </div>
            </div>
          </div>
        @enderror
        @error('email')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ກະລຸນາໃສ່ອີເມລ!
              </div>
            </div>
          </div>
        @enderror
        @error('password')
          <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
            <div class="md-toast md-toast-error" style="">
              <div class="md-toast-message">
                ກະລຸນາໃສ່ລະຫັດຜ່ານ!
              </div>
            </div>
          </div>
        @enderror

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

        <!-- Card -->
        <div class="card card-cascade narrower">
          <section>
            <div class="row">
              <div class="col-xl-12 col-log-12 mr-0 pb-2">
                <div class="view view-cascade gradient-card-header light-blue lighten-1">
                  <h4 class="h4-responsive mb-0 font-weight-500">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</h4>
                </div>

                <div class="card-body card-body-cascade pb-0">
                  <form class="row py-3 pl-4" action="{{ url('addnewuser') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                      <div class="row text-center">
                        <div class="avatar mx-auto white"><img src="{{ url('images/person.png') }}" class="rounded-circle 1img-fluid" id="showimg" style="height: 4cm;width: 4cm">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="md-form">
                            <div class="file-field">
                              <div class="btn btn-primary btn-sm float-left">
                                <span>ເລືອກຮູບພາບ</span>
                                <input type="file" value="" name="fimage" id="fimage" required oninvalid="this.setCustomValidity('ກະລຸນາເລືອກຮູບພາບໂປຣໄຟລ໌!')"
                                oninput="this.setCustomValidity('')">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" id="fimgname" value="" placeholder="ອັບໂຫລດຮູບພາບ...">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="md-form">
                        <i class="fas fa-user-tie prefix"></i>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input class="form-control" type="text" name="name" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້!')"
                        oninput="this.setCustomValidity('')">
                        <label for="name">ຊື່ຜູ້ໃຊ້</label>
                      </div>
                      <div class="md-form">
                        <label for=""></label>
                        <div class="switch">
                          <label>
                            ປິດ
                            <input type="checkbox" name="status" value="ເປີດໃຊ້ງານ">
                            <span class="lever"></span> ເປີດໃຊ້ງານ
                          </label>
                        </div>
                      </div>
                      <br><br><br>
                      <div class="card text-center">
                        <div class="card-header success-color white-text">
                          ສະຖານະ
                        </div>
                        <div class="card-body">
                          <div class="switch">
                            <label>ຜູ້ໃຊ້
                              <input type="checkbox" name="roles" id="roles" value="1">
                              <span class="lever"></span> ແອັດມິນ
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="md-form">
                        <i class="fas fa-mail-bulk prefix"></i>
                        <input class="form-control" type="email" name="email" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ອີເມວຜູ້ໃຊ້!')"
                        oninput="this.setCustomValidity('')">
                        <label for="email">ອີເມວ</label>
                      </div>
                      <div class="md-form input-group mb-3">
                        <div class="input-group-prepend">
                          <button class="input-group-text md-addon" type="button" id="btnShowpassword" title="ສະແດງລະຫັດຜ່ານ"><i class="fas fa-eye"></i></button>
                        </div>
                        <input class="form-control" type="password" id="password" name="password" placeholder="ລະຫັດຜ່ານ" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລະຫັດຜ່ານ!')"
                        oninput="this.setCustomValidity('')">
                        <div class="input-group-append">
                          <button class="input-group-text md-addon" type="button" id="btnRandompass" title="ແຣນດອມລະຫັດຜ່ານ"><i class="fas fa-random"></i></button>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header primary-color white-text">
                          ສິດທິຜູ້ໃຊ້
                        </div>
                        <div class="card-body">
                          <fieldset class="form-check">
                            <input type="checkbox" class="form-check-input" id="Add" name="Add" value="1" checked>
                            <label class="form-check-label" for="Add">ເພີ່ມຂໍ້ມູນ</label>
                          </fieldset>
                          <fieldset class="form-check">
                            <input type="checkbox" class="form-check-input" id="Edit" name="Edit" value="2" checked>
                            <label class="form-check-label" for="Edit">ແກ້ໄຂຂໍ້ມູນ</label>
                          </fieldset>
                          <fieldset class="form-check">
                            <input type="checkbox" class="form-check-input" id="Delete" name="Delete" value="3" checked>
                            <label class="form-check-label" for="Delete">ລຶບຂໍ້ມູນ</label>
                          </fieldset>
                          <fieldset class="form-check">
                            <input type="checkbox" class="form-check-input" id="View" name="View" value="4" checked>
                            <label class="form-check-label" for="View">ເບິ່ງຂໍ້ມູນ</label>
                          </fieldset>
                          <fieldset class="form-check">
                            <input type="checkbox" class="form-check-input" id="ManageUser" name="ManageUser" value="5">
                            <label class="form-check-label" for="ManageUser">ຈັດການຜູ້ໃຊ້</label>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="text-center">
                        <button class="btn btn-outline-success waves-effect" type="submit"><i class="fas fa-plus-circle"></i> ບັນທຶກ</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="waves-ripple" data-hold="1588692264797" data-x="130.78125" data-y="22.125" data-scale="scale(5.1)" data-translate="translate(0,0)" 
								style="top:22.125px;left:130.78125px;opacity:0;-webkit-transition-duration:750ms;-moz-transition-duration:750ms;-o-transition-duration:750ms;transition-duration:750ms;-webkit-transform:scale(5.1) translate(0,0);-moz-transform:scale(5.1) translate(0,0);-ms-transform:scale(5.1) translate(0,0);-o-transform:scale(5.1) translate(0,0);transform:scale(5.1) translate(0,0);"></div>
            </div>
          </section>
        </div>
        <!-- Card -->
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
<script src="{{ url('js/newuser.js') }}"></script>
@include('packages.footer')

@endif

@else
  <meta http-equiv="refresh" content="0; url={{ url('/') }}">
@endif