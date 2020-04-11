@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|ダッシュボード
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg- no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                        <div class="large">{{ $users }}</div>
                        <div class="text-muted">スタッフ数</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-list-alt"></em>
                        <div class="large">52</div>
                        <div class="text-muted">本日出勤予定</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">本日出勤予定のスタッフ</div>
                <div class="panel-body btn-margins">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>出勤時間</th>
                                    <th>退勤時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($go_to_work_staffs as $go_to_work_staff)
                                    <tr>
                                        <td>{{ $go_to_work_staff->user->id }}</td>
                                        <td>{{ $go_to_work_staff->user->name }}さん</td>
                                        <td>{{ date('G:i',strtotime($go_to_work_staff->attendance)) }}</td>
                                        <td>{{ date('G:i',strtotime($go_to_work_staff->leaving)) }}</td>
                                    </tr>
                                @empty
                                    <h3>本日出勤予定のスタッフはいません</h3>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div><!--/.row-->
@endsection
@section('script')
    <script>
        $("#dashboard").addClass("active");
    </script>
@endsection
