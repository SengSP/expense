<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- <meta name="csrf-token" content="{{ csrf-token() }}"> --}}
  <title>Login</title>
  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  {{-- Bootstrap core css --}}
  <link rel="stylesheet" href="{{ url('mdbtheme/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('mdbtheme/css/mdb.min.css') }}">
  <link rel="shortcut icon" href="{{ url('images/person.png') }}" type="image/x-icon">
</head>
<body>
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

            @error('pass')
              <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
                <div class="md-toast md-toast-error" style="">
                  <div class="md-toast-message">
                    ລະຫັດຂອງທ່ານມີໜ້ອຍກວ່າ 8 ໂຕ
                  </div>
                </div>
              </div>
            @enderror
            
            @if ($message = Session::get('error'))
            <div id="toast-container" class="md-toast-top-right wow tada" aria-live="polite" role="alert">
              <div class="md-toast md-toast-error" style="">
                <div class="md-toast-message">
                  {{ $message }}
                </div>
              </div>
            </div>
            @endif

            <!-- Form with header -->
            <div class="card wow fadeIn" data-wow-delay="0.3s">
              <div class="card-body">

                <!-- Header -->
                <div class="form-header blue-gradient">
                  <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> ເຂົ້າລະບົບ</h3>
                </div>
                <form action="{{ url('loginsystem') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="md-form">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="email" id="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ອີເມວຂອງທ່ານ!')"
                    oninput="this.setCustomValidity('')">
                    <label for="email">ອີເມວ</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" id="pass" class="form-control" name="pass" required oninvalid="this.setCustomValidity('ກະລຸນາໃສ່ລະຫັດຂອງທ່ານ!')"
                    oninput="this.setCustomValidity('')">
                    <label for="pass">ລະຫັດຜ່ານ</label>
                  </div>

                  <div class="text-center">
                    <button class="btn blue-gradient btn-lg" type="submit">ເຂົ້າລະບົບ <i class="fas fa-sign-in-alt"></i></button>
                    
                  </div>
                </form>
                <div class="waves-ripple" data-hold="1588692264797" data-x="130.78125" data-y="22.125" data-scale="scale(5.1)" data-translate="translate(0,0)" 
								style="top:22.125px;left:130.78125px;opacity:0;-webkit-transition-duration:750ms;-moz-transition-duration:750ms;-o-transition-duration:750ms;transition-duration:750ms;-webkit-transform:scale(5.1) translate(0,0);-moz-transform:scale(5.1) translate(0,0);-ms-transform:scale(5.1) translate(0,0);-o-transform:scale(5.1) translate(0,0);transform:scale(5.1) translate(0,0);"></div>
              </div>
            </div>
            <!-- Form with header -->

          </div>
        </div>
      </div>

  <script text="text/javascript" src="{{ url('mdbtheme/js/jquery-3.4.1.min.js') }}"></script>
  <script text="text/javascript" src="{{ url('mdbtheme/js/popper.min.js') }}"></script>
  <script text="text/javascript" src="{{ url('mdbtheme/js/bootstrap.min.js') }}"></script>
  <script text="text/javascript" src="{{ url('mdbtheme/js/mdb.js') }}"></script>

  <script>
    new WOW().init();
  </script>
</body>
</html>