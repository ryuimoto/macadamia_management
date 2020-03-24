<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="{{ asset('library/lumino/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('library/lumino/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('library/lumino/css/styles.css') }}" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">管理側　ログインフォーム</div>
				<div class="panel-body">
					<form role="form" name="form1" method="POST" action="{{ route('admin.login') }}">
						@csrf
						<fieldset>
							@if ($errors->has('email'))
								<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong><br>
								</span>
							@endif
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
							<div class="form-group">
								<input class="form-control" placeholder="メールアドレス" name="email" type="email" value="{{ old('email') }}" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="パスワード" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<a href="javascript:form1.submit()" class="btn btn-primary">ログイン</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
<script src="{{ asset('library/lumino/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('library/lumino/js/bootstrap.min.js') }}"></script>
</body>
</html>
