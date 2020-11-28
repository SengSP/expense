<!-- modal account -->
<div class="modal fade" id="modalaccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-top modal-notify modal-info" role="document">
    <!-- Content -->
    <form class="modal-content" action="{{ url('updateaccount') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="modal-header light-blue darken-3">
          <h3>ຂໍ້ມູນຜູ້ໃຊ້</h3>
        </div>
        <div class="modal-body mb-1">
          <div class="row text-center">
            <div class="avatar mx-auto white">
              <img src="{{ url('images/'.Auth::user()->image) }}" class="rounded-circle 1img-fluid" id="showimg" style="height: 4cm;width: 4cm">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="md-form">
                <div class="file-field">
                  <div class="btn btn-primary btn-sm float-left">
                    <span>ເລືອກຮູບພາບ</span>
                    <input type="file" value="" name="fimage" id="fimage" oninvalid="this.setCustomValidity('ກະລຸນາເລືອກຮູບພາບໂປຣໄຟລ໌!')"
                        oninput="this.setCustomValidity('')">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" id="fimgname" value="" placeholder="ອັບໂຫລດຮູບພາບ...">
                  </div>
                </div>
              </div>
              <div class="md-form">
                <i class="fas fa-user-tie prefix"></i>
                <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ຊື່ຜູ້ໃຊ້!')"
                  oninput="this.setCustomValidity('')">
                <label for="name">ຊື່ຜູ້ໃຊ້</label>
              </div>
              <div class="md-form">
                <i class="fas fa-mail-bulk prefix"></i>
                <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ອີເມວຜູ້ໃຊ້!')"
                  oninput="this.setCustomValidity('')">
                <label for="email">ອີເມວ</label>
              </div>
            </div>
          </div>
              
        </div>
        <!-- Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success waves-effect ml-auto">ແກ້ໄຂຂໍ້ມູນ</button>
          <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal">ຍົກເລີກ</button>
        </div>
    </form>
    <!-- Content -->
  </div>
</div>

<!-- modal account -->
<div class="modal fade" id="modalchangeacpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-top modal-notify modal-info" role="document">
    <!-- Content -->
    <form class="modal-content" action="{{ url('changeaccountpass') }}" method="POST">
      {{ csrf_field() }}
        <div class="modal-header light-blue darken-3">
          <h3>ຂໍ້ມູນຜູ້ໃຊ້</h3>
        </div>
        <div class="modal-body mb-1">
          <div class="row">
            <div class="col-md-12">
              <div class="md-form input-group mb-3">
                <div class="input-group-prepend">
                  <button class="input-group-text md-addon" type="button" id="btnShowpassword" title="ສະແດງລະຫັດຜ່ານ"><i class="fas fa-eye"></i></button>
                </div>
                <input class="form-control" type="password" id="password" name="password" value="" placeholder="ລະຫັດຜ່ານ" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລະຫັດຜ່ານ!')"
                oninput="this.setCustomValidity('')">
                <div class="input-group-append">
                  <button class="input-group-text md-addon" type="button" id="btnRandompass" title="ແຣນດອມລະຫັດຜ່ານ"><i class="fas fa-random"></i></button>
                </div>
              </div>
            </div>
          </div>
              
        </div>
        <!-- Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success waves-effect ml-auto">ແກ້ໄຂຂໍ້ມູນ</button>
          <button type="button" class="btn btn-outline-danger waves-effect ml-auto" data-dismiss="modal">ຍົກເລີກ</button>
        </div>
    </form>
    <!-- Content -->
  </div>
</div>


<script text="text/javascript" src="{{ url('/mdbtheme/js/jquery-3.4.1.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/popper.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/bootstrap.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/mdb.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/addons/datatables.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/addons/datatables-select.min.js') }}"></script>
<script text="text/javascript" src="{{ url('/mdbtheme/js/modules/picker-date.js') }}"></script>
<script>
  new WOW().init();
</script>

<script src="{{ url('js/account.js') }}"></script>