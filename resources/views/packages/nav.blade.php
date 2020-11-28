<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

  <!-- SideNav slide-out button -->
  <div class="float-left">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
  </div>

  <!-- Breadcrumb -->
  <div class="breadcrumb-dn mr-auto">
    <p>{{ $title }}</p>
  </div>

  <div class="d-flex change-mode">

    <!-- Navbar links -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">

      <!-- Dropdown -->
      {{-- <li class="nav-item dropdown notifications-nav">
        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="badge red">3</span> <i class="fas fa-bell"></i>
          <span class="d-none d-md-inline-block">Notifications</span>
        </a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">
            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
            <span>New order received</span>
            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
            <span>New order received</span>
            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
            <span>Your campaign is about to end</span>
            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span
            class="clearfix d-none d-sm-inline-block">Contact</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
            class="clearfix d-none d-sm-inline-block">Support</span></a>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle"></i> <span class="clearfix d-none d-sm-inline-block">ບັນຊີ</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i> ອອກຈາກລະບົບ</a>
          <button class="dropdown-item" id="btnAccount"><i class="fas fa-address-book"></i> ຂໍ້ມູນບັນຊີຂອງຂ້ອຍ</a>
          <button class="dropdown-item" id="btnChangAcpass"><i class="fas fa-key"></i> ປ່ຽນລະຫັດຜ່ານ</a>
        </div>
      </li>

    </ul>
    <!-- Navbar links -->

  </div>

</nav>
<!-- Navbar -->

<!-- Fixed button -->
{{-- <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

  <a class="btn-floating btn-lg red">
    <i class="fas fa-pencil-alt"></i>
  </a>

  <ul class="list-unstyled">
    <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
    <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
    <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
  </ul>

</div> --}}
<!-- Fixed button -->

</header>
<!-- Main Navigation -->