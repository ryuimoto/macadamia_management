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
                    <form role="form" method="POST" action="{{ route('admin.notification_settings') }}">
                        @csrf
                        <div class="form-group">
                            <label>LINE通知</label>
                            <select class="form-control" name="notification_flag">
                                <option value="1">ON</option>
                                <option value="0">OFF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>クライアントに月末の通知を送る(※毎月の日にちを指定)</label>
                            <select class="form-control" name="sending_period_day">
                                <option value="0">通知しない</option>
                                <option value="21">21日</option>
                                <option value="25">25日</option>
                                <option value="27">27日</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>通知する時間</label>
                            <select class="form-control" name="sending_period_time">
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>内容</label>
                            <textarea class="form-control" rows="3" name="contents" placeholder="記入した内容に加え、スタッフの労働時間が記述されます。"></textarea>
                        </div>
                        <div class="form-group has-error">
                            <button type="submit" class="btn btn-lg btn-primary" name="line_setting" value="line_setting">編集</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">通知テスト</div>
            <div class="panel-body">
                <div class="col-md-6">
                    <form action="{{ route('admin.notification_settings') }}" name="line_test" method="POST">
                        @csrf
                        <div class="form-group">
                            @if (Session::has('line_post'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('line_post') }}</strong>
                                </div>
                            @endif
                            <label>LINE</label>
                            <input type="text" class="form-control" name="line_text" placeholder="入力されたテキストが送信されます">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="send_working_hours" value="1">労働時間を送る
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>※通知するLINEチャンネルはLINE Developersから変更してください</label>
                            <a href="https://developers.line.biz/ja/" target="_brank">https://developers.line.biz/ja/</a>
                        </div>
                        <div class="form-group has-error">
                            <button type="submit" class="btn btn-lg btn-success" name="line_test" value="line_test">送信</button>
                        </div>
                    </form>
                    <form action="{{ route('admin.notification_settings') }}" name="mail_test" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>メール</label>
                            <input type="email" class="form-control" name="mail_address" placeholder="メールアドレス">
                            <br>
                            <input type="text" class="form-control" name="mail_text" placeholder="入力されたテキストが送信されます">
                        </div>
                        <div class="form-group has-error">
                            <button type="submit" class="btn btn-lg btn-success" name="mail_test" value="mail_test">送信</button>
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