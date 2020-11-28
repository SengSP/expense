  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0"><img src="{{ url('images/'.Auth::user()->image) }}" class="rounded-circle" style="height: 1.8cm;width:1.8cm"></a>
          </div>
        </li>

        <!-- Search Form -->
        {{-- <li>
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2" placeholder="Search">
            </div>
          </form>
        </li> --}}

        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">

            <li>
              <a href="{{ url('dashboard') }}">
                <i class="w-fa fas fa-tachometer-alt"></i>ໜ້າກະດານ
              </a>
            </li>
            @role('Admin')
            <li>
              <a class="collapsible-header waves-effect arrow-r">
                <i class="w-fa far fa-user-circle"></i>ຜູ້ໃຊ້<i class="fas fa-angle-down rotate-icon"></i>
              </a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a href="{{ url('adduser') }}" class="waves-effect"><i class="fas fa-user-plus"></i> ເພີ່ມຜູ້ໃຊ້</a>
                  </li>
                  <li>
                    <a href="{{ url('userlist') }}" class="waves-effect"><i class="fas fa-users-cog"></i> ລາຍການຜູ້ໃຊ້</a>
                  </li>
                </ul>
              </div>
            </li>
            @endrole
            <li>
              <a href="{{ url('buying') }}">
                <i class="w-fa far fa-money-bill-alt"></i>ລາຍຈ່າຍ
              </a>
            </li>

          </ul>
        </li>
        <!-- Side navigation links -->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->
