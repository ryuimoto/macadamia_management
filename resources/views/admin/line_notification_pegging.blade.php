@extends('admin.layouts.main_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/line_notification_pegging.css') }}">
@endsection
@section('title')
    MM管理画面|LINE通知紐付け
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">LINE通知紐付け</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>ユーザー</h2>
            <div class="panel panel-default ">
                <div class="panel-heading">
                    新着
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body timeline-container">
                    @forelse ($notification_users as $notification_user)
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge"><i class="glyphicon glyphicon-pushpin"></i></div>
                                <div class="timeline-panel">
                                    <a href="{{ route('admin.line_notification_pegging_details','user_id => 1') }}">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ $notification_user->line_displayname }}</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $notification_user->line_user_id }}</p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    @empty
                    <p>依頼はありません</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>スーパーバイザー</h2>
            <div class="panel panel-default ">
                <div class="panel-heading">
                    新着
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body timeline-container">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge"><i class="glyphicon glyphicon-pushpin"></i></div>
                            <div class="timeline-panel">
                                <a href="{{ route('admin.line_notification_pegging_details','user_id => 1') }}">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">田中たけし</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Ltwetwetwgergegeryqwt.</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#line_notification_pegging").addClass("active");
    </script>
@endsection