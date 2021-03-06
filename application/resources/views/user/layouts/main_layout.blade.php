<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" > --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('fullcalendar_library')
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <h3 class="navbar-brand brand-logo">M|Management</h3><br>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  @if ($is_image)
                    <img src="/storage/profile_images/{{ $username->image_name }}" alt="image">
                  @else
                    <img class="rounded-circle" src="{{ asset('img/dummy.png') }}" width="100" height="100" alt="profile">
                  @endif
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ $username->name }}さん </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('user.acount_edit') }}">
                  <i class="mdi mdi-cached mr-2 text-success"></i> アカウント編集 </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('user.setting') }}">
                  <i class="mdi mdi-settings mr-2 text-success"></i> 設定 </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('user.logout') }}">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> ログアウト </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{ route('user.acount_edit') }}" class="nav-link">
                <div class="nav-profile-image">
                  @if ($is_image)
                    <img src="/storage/profile_images/{{ $username->image_name }}" alt="image">
                  @else
                    <img class="rounded-circle" src="{{ asset('img/dummy.png') }}" width="100" height="100" alt="profile">
                  @endif
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ $username->name }}さん</span>
                  <span class="text-secondary text-small">{{ $status->name }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.dashboard') }}">
                <span class="menu-title">ダッシュボード</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">シフト</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book-open-variant"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('user.easy_registration') }}">一括登録</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('user.shift_create') }}">パターン登録</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('user.registration_pattern') }}">パターンの編集</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('user.shift_list') }}">シフト表</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <?php $date =  new \Carbon\Carbon() ?>
              <a class="nav-link" href="{{ route('user.monthly_attandance_record',['date' => $date->toDateString(),'process' => 'basis',]) }}">
                <span class="menu-title">月次出勤簿</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          @yield('contents')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.bootstrapdash.com/" target="_blank">Macadamia</a>. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    @yield('js')
    @yield('plugin_js')
  </body>
</html>