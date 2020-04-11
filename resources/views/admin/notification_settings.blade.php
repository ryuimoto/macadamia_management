@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|通知設定
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">通知設定</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">メール通知</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form">
                        <div class="form-group">
                            <label>メール通知</label>
                            <select class="form-control">
                                <option>ON</option>
                                <option>OFF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>通知する相手を登録</label>
                            <input type="email" class="form-control" placeholder="メールアドレス">
                        </div>
                        <div class="form-group">
                            <label>クライアントに月末の通知を送る(※毎月の日にちを指定)</label>
                            <select class="form-control">
                                <option>25日</option>
                                <option>27日</option>
                            </select>
                        </div>
                        <div class="form-group has-error">
                            <button type="button" class="btn btn-lg btn-primary">編集</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">LINE通知</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form">
                        <div class="form-group">
                            <label>LINE通知</label>
                            <select class="form-control">
                                <option>ON</option>
                                <option>OFF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>クライアントに月末の通知を送る(※毎月の日にちを指定)</label>
                            <select class="form-control">
                                <option>通知しない</option>
                                <option>21日</option>
                                <option>25日</option>
                            </select>
                        </div>
                        <div class="form-group has-error">
                            <button type="button" class="btn btn-lg btn-primary">編集</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#notification_settings").addClass("active");
    </script>
@endsection