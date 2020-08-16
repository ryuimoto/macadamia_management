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
                    <?php $prev_date = new \Carbon\Carbon($date) ?>
                    <a href="{{ route('admin.attendance_status',['date' =>$prev_date->subMonth()->format('Y年m月') ]) }}">≪</a>
                    {{ $date->format('Y年m月') }}
                    <?php $next_date = new \Carbon\Carbon($date) ?>
                    <a href="{{ route('admin.attendance_status',['date' =>$next_date->addMonth()->format('Y年m月') ]) }}">≫</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($users as $key => $user)
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">{{ $user->name }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-6 control-label">総労働時間</label>
                            <div class="col-md-6">
                                <p>{{ $total_working_time[$key] }}時間</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">出勤日数</label>
                            <div class="col-md-6">
                                <p>{{ $working_days[$key] }}日</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        @empty
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        $("#attendance_status").addClass("active");
    </script>
@endsection