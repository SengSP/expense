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

      @error('fimage')
        <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
          <div class="md-toast md-toast-danger" style="">
            <div class="md-toast-message">
              ຊະນິດຮູບພາບຂອງທ່ານບໍ່ມີນາມສະກຸນເປັນ: jpeg,png,jpg,gif,svg
            </div>
          </div>
        </div>
      @enderror

      {{-- alert div --}}
      <div class="waves-ripple" data-hold="1588692264797" data-x="130.78125" data-y="22.125" data-scale="scale(5.1)" data-translate="translate(0,0)" 
				style="top:22.125px;left:130.78125px;opacity:0;-webkit-transition-duration:750ms;-moz-transition-duration:750ms;-o-transition-duration:750ms;transition-duration:750ms;-webkit-transform:scale(5.1) translate(0,0);-moz-transform:scale(5.1) translate(0,0);-ms-transform:scale(5.1) translate(0,0);-o-transform:scale(5.1) translate(0,0);transform:scale(5.1) translate(0,0);"></div>

      <!-- Section: Intro -->
      <section class="mb-5">

        <div class="card card-cascade narrower">
          <section>
            <div class="row">
              <div class="col-xl-12 col-lg-12 mr-0 pb-2">
                <div class="view view-cascade gradient-card-header light-blue lighten-1">
                  <h4 class="h4-responsive mb-0 font-weight-500">ລາຍການຂໍ້ມູນຜູ້ໃຊ້</h4>
                </div>

                <div class="card-body card-body-cascade pb-0">
                  <table id="dtuserlist" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>ລຳດັບ</th>
                        <th>ຊື່ຜູ້ໃຊ້</th>
                        <th>ອີເມວ</th>
                        <th>ຮູບພາບ</th>
                        <th>ສະຖານະ</th>
                        <th>ຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (count($listuser) > 0)
                      @foreach ($listuser as $lu)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $lu->name }}</td>
                        <td>{{ $lu->email }}</td>
                        <td>
                          @if ($lu->image == "")
                            <img src="{{ url('images/person.png') }}" alt="" srcset="">
                          @else
                            <img src="{{ url('images/'.$lu->image) }}" width="50px" height="50px" />
                          @endif
                        </td>
                        <td>
                          @if ($lu->status == "public")
                            <button class="btn btn-success btn-sm" type="button" id="btnChangestatus" value="{{ $lu->id }}">{{ $lu->status }}</button>
                          @else
                            <button class="btn btn-danger btn-sm" type="button" id="btnChangestatus" value="{{ $lu->id }}">{{ $lu->status }}</button>
                          @endif
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                            <div class="dropdown-menu dropdown-primary">
                              <button class="dropdown-item" type="button" id="btnChangeimg" value="{{ $lu->id }}{{ $lu->image }}"><i class="fas fa-image"></i> ປ່ຽນຮູບໂປຣໄຟລ</button>
                              <button class="dropdown-item" type="button" id="btnChangepass" value="{{ $lu->id }}"><i class="fas fa-key"></i> ປ່ຽນລະຫັດຜ່ານ</button>
                              <button class="dropdown-item" type="button" id="btnChangeRole" value="{{ $lu->id }}"><i class="fas fa-user-shield"></i> ຈັດການສິດທິ</button>
                              <button class="dropdown-item" type="button" id="btnEdituser" value="{{ $lu->id }}"><i class="fas fa-users-cog"></i> ແກ້ໄຂຂໍ້ມູນ</button>
                              <button class="dropdown-item" type="button" id="btnTrashuser" value="{{ $lu->id }}"><i class="fas fa-trash-alt"></i> ລຶບຜູ້ໃຊ້</button>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="6">
                          <h5 class="text-center text-danger">ບໍ່ມີຂໍ້ມູນໃນລະບົບ</h5>
                        </td>
                      </tr>
                    @endif
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </section>
        </div>

      </section>

      {{-- modal change image --}}
      <div class="modal fade" id="modalChangeimg" tabindex="-1" role="dialog" aria-labelledby="modalChangeimgLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
          {{-- Content --}}
          <div class="modal-content">
            {{-- Header --}}
            <div class="modal-header">
              <img src="{{ url('images/person.png') }}" id="showimg" alt="ProfileImage" class="rounded-circle"  style="height: 4cm;width: 4cm">
            </div>
            <div class="modal-body text-center mb-1">
              <form action="{{ url('changeprofile') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="md-form">
                  <input type="hidden" name="imguserid" id="imguserid" value="">
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
                <div class="md-form text-center">
                  <button class="btn btn-success" type="submit"><i class="fas fa-exchange-alt"></i> ປ່ຽນຮູບໂປຣໄຟລ໌</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- modal change status --}}
      <div class="modal fade" id="modalChangestatus" tabindex="-1" role="dialog" aria-labelledby="mdchangestatus" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          {{-- Content --}}
          <div class="modal-content">
            {{-- Header --}}
            <div class="modal-header">
              <h3 class="text-center">ກົດປຸ່ມເພື່ອສະຖານະ</h3>
            </div>
            <div class="modal-body text-center mb-1">
              <form action="{{ url('changeuserstatus') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="stuserid" id="stuserid" value="">
                <input type="hidden" name="status" id="status" value="">
                <button class="" type="submit" id="btnUpdatestatus"><i class="fas fa-exchange-alt"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- modal change pass --}}
      <div class="modal fade" id="modalChangepass" tabindex="-1" role="dialog" aria-labelledby="mdchangepass" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          {{-- Content --}}
          <div class="modal-content">
            {{-- Header --}}
            <div class="modal-header">
              <h3 class="text-center">ປ່ຽນລະຫັດຜ່ານ</h3>
            </div>
            <div class="modal-body text-center mb-1">
              <form action="{{ url('changeUserpass') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="passuserid" id="passuserid" value="">
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
                <div class="md-form">
                  <button class="btn btn-success" type="submit"><i class="fas fa-user-lock"></i> ປ່ຽນລະຫັດຜ່ານ</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- Modal add role and permission --}}
      <div class="modal fade" id="modalrole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
          <!-- Content -->
          <form class="modal-content" action="{{ url('updaterolepms') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="rpmsuserid" id="rpmsuserid" value="">
            <!-- Modal cascading tabs -->
            <div class="modal-c-tabs">

              <!-- Nav tabs -->
              <ul class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                <li class="nav-item">
                  <h3 class="text-center text-white">ຈັດການສິດທິຜູ້ໃຊ້</h3>
                </li>
              </ul>

              <!-- Tab panels -->
              <div class="tab-content">
                <div class="tab-pane fade in show active" id="" role="tabpanel">

                  <!-- Body -->
                  <div class="modal-body mb-1">
                    
                    <div class="row">
                      <div class="col-md-6">
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
                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-header primary-color white-text">
                            ສິດທິ
                          </div>
                          <div class="card-body">
                            <fieldset class="form-check">
                              <input type="checkbox" class="form-check-input" id="Add" name="Add" value="1">
                              <label class="form-check-label" for="Add">ເພີ່ມຂໍ້ມູນ</label>
                            </fieldset>
                            <fieldset class="form-check">
                              <input type="checkbox" class="form-check-input" id="Edit" name="Edit" value="2">
                              <label class="form-check-label" for="Edit">ແກ້ໄຂຂໍ້ມູນ</label>
                            </fieldset>
                            <fieldset class="form-check">
                              <input type="checkbox" class="form-check-input" id="Delete" name="Delete" value="3">
                              <label class="form-check-label" for="Delete">ລຶບຂໍ້ມູນ</label>
                            </fieldset>
                            <fieldset class="form-check">
                              <input type="checkbox" class="form-check-input" id="View" name="View" value="4">
                              <label class="form-check-label" for="View">ເບິ່ງຂໍ້ມູນ</label>
                            </fieldset>
                            <fieldset class="form-check">
                              <input type="checkbox" class="form-check-input" id="ManageUser" name="ManageUser" value="5">
                              <label class="form-check-label" for="ManageUser">ຈັດການຜູ້ໃຊ້</label>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <!-- Footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success waves-effect ml-auto"><i class="fas fa-save"></i> ບັນທຶກ</button>
                    <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal"><i class="fas fa-window-close"></i> ປິດ</button>
                  </div>

                </div>
              </div>

            </div>
          </form>
          <!-- Content -->
        </div>
      </div>

      {{-- modal delete user --}}
      <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-sm" role="document">
          <!-- Content -->
          <form class="modal-content" action="{{ url('deleteuser') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="deluserid" id="deluserid" value="">
            <!-- Modal cascading tabs -->
            <div class="modal-c-tabs">

              <!-- Nav tabs -->
              <ul class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                <li class="nav-item">
                  <h3 class="text-center text-white">ລົບຜູ້ໃຊ້</h3>
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
                        <input type="hidden" name="trashuserid" id="trashuserid" value="">
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

      {{-- modal edit user --}}
      <div class="modal fade" id="modaledituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
          <!-- Content -->
          <form class="modal-content" action="{{ url('updateuserdata') }}" method="POST">
            {{ csrf_field() }}
            <!-- Modal cascading tabs -->
            <div class="modal-c-tabs">

              <!-- Nav tabs -->
              <ul class="nav md-tabs tabs-2 light-blue darken-3" role="tablist">
                <li class="nav-item">
                  <h3 class="text-center text-white">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h3>
                </li>
              </ul>

              <!-- Tab panels -->
              <div class="tab-content">
                <div class="tab-pane fade in show active" id="" role="tabpanel">

                  <!-- Body -->
                  <div class="modal-body mb-1">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="md-form">
                          <i class="fas fa-user-tie prefix"></i>
                          <input type="hidden" name="edituserid" id="edituserid" value="">
                          <input class="form-control" type="text" name="name" id="name" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້!')"
                          oninput="this.setCustomValidity('')">
                          <label for="name">ຊື່ຜູ້ໃຊ້</label>
                        </div>
                        <div class="md-form">
                          <i class="fas fa-mail-bulk prefix"></i>
                          <input class="form-control" type="email" name="email" id="email" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ອີເມວຜູ້ໃຊ້!')"
                          oninput="this.setCustomValidity('')">
                          <label for="email">ອີເມວ</label>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <!-- Footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success waves-effect ml-auto"><i class="fas fa-pen"></i> ແກ້ໄຂຂໍ້ມູນ</button>
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
  <script src="{{ url('js/userlist.js') }}"></script>
  @include('packages.footer')

  @endif
  
  @else
    <meta http-equiv="refresh" content="0; url={{ url('/') }}">
  @endif