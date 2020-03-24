<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  {{-- <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/logo.svg') }}"> --}}
                  <h2>MacadamiaManagement</h2>
                </div>
                <h4>登録フォーム</h4>
                <form method="POST" class="pt-3" name="form1" action="{{ route('user.register') }}">
                  @csrf
                  <div class="form-group">
                    @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="名前">
                  </div>
                  <div class="form-group">
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="メールアドレス">
                  </div>
                  <div class="form-group">
                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="パスワード">
                  </div>
                  <div class="form-group">
                    @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                    @endif
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="パスワードの確認">
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="javascript:form1.submit()">アカウント作成</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> アカウントをお持ちの方はこちらへ <a href="{{ route('user.login') }}" class="text-primary"><br>ログインする</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/misc.js') }}"></script>
    <!-- endinject -->
  </body>
</html>