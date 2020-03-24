@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|出勤状況
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance_status.css') }}">
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">出勤状況</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="">≪</a>
                    ○年○月
                    <a href="">≫</a>
                </div>
            </div><!-- /.panel-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel position-relative">
                <div class="panel-heading">ユーザー名
                </div>
                <div class="panel-body">
                    <div class="form-group position-relative">
                        <label>実労働時間</label>
                        <p>○時間</p>
                        <label>出勤日数</label>
                        <p>○時間</p>
                        <a class="stretched-link" href="">詳細</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#attendance_status").addClass("active");
    </script>
@endsection