<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="{{ asset('library/lumino/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('library/lumino/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('library/lumino/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('library/lumino/css/styles.css') }}" rel="stylesheet">
	@yield('css')
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="{{ route('admin.dashboard') }}"><span>M|Management</span> 管理画面</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="{{ route('admin.logout') }}">
								<div><em class="fa fa-power-off"></em> ログアウト</div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				{{-- <div class="profile-usertitle-name">{{ auth()->user()->name }}</div> --}}
				<div class="profile-usertitle-name">アドミン太郎</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">
			<li id="dashboard"><a href="{{ route('admin.dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> ダッシュボード</a></li>
			<li id="staff_info"><a href="{{ route('admin.staff_info') }}"><em class="fa fa-users">&nbsp;</em> スタッフ情報</a></li>
			<?php $date = new \Carbon\Carbon() ?>
			<li id="attendance_status"><a href="{{ route('admin.attendance_status',['date' => $date->format('Y年m月')]) }}"><em class="fa fa-bar-chart">&nbsp;</em> 出勤状況</a></li>
			<li id="line_notification_pegging"><a href="{{ route('admin.line_notification_pegging') }}"><em class="fa fa-comments">&nbsp;</em> LINE通知紐付け</a></li>
			<li id="notification_settings"><a href="{{ route('admin.notification_settings') }}"><em class="fa fa-toggle-off">&nbsp;</em> 通知設定</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('contents')
	</div>	<!--/.main-->
	<script src="{{ asset('library/lumino/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('library/lumino/js/bootstrap.min.js') }}"></script>
	{{-- <script src="{{ asset('library/lumino/js/chart.min.js') }}"></script> --}}
	<script src="{{ asset('library/lumino/js/chart-data.js') }}"></script>
	<script src="{{ asset('library/lumino/js/easypiechart.js') }}"></script>
	<script src="{{ asset('library/lumino/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('library/lumino/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('library/lumino/js/custom.js') }}"></script>
    @yield('script')
</body>
</html>