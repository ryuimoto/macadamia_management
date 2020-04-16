@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|LINE通知紐付け
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">スタッフ情報と紐付け</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('admin.line_notification_pegging_details',$request_id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label>スタッフを選択してください</label>
                            <select class="form-control" name="person">
                                @forelse ($persons as $person)
                                    <option value={{ $person->id }}>{{ $person->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>LINEアカウント名</label>
                            <input type="hidden" name="line_displayname" value="{{ $line_data->line_displayname }}">
                            <p>{{ $line_data->line_displayname }}</p>
                        </div>
                        <div class="form-group">
                            <label>LINE User_id</label>
                            <input type="hidden" name="line_user_id" value="{{ $line_data->line_user_id }}">
                            <p>{{ $line_data->line_user_id }}</p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
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