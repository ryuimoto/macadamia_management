@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|スタッフ情報
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">スタッフ情報</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">スタッフを編集</div>
                <div class="panel-body">
                    <form class="form-horizontal row-border" method="POST" action="{{ route('admin.staff_info_details',$user->id) }}">
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-md-2 control-label">名前</label>
                            <div class="col-md-10">
                                <input type="text" name="user_name" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">メールアドレス</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-success">編集</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#staff_info").addClass("active");
    </script>
@endsection