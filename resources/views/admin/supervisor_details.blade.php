@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|スーパーバイザー詳細
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">スーパーバイザー詳細</h1>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('admin.super_visor') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_token" value="H2NMyeXb6lvKx8w2ZrNLQuKFcCVB5qd0e8HSKIBu">                        <div class="form-group">
                            <label>名前</label>
                            <input type="text" class="form-control" name="name" value="{{ $super_visor->name }}">
                        </div>
                        <div class="form-group">
                            <label>メールアドレス</label>
                            <input type="email" class="form-control" name="email" value="{{ $super_visor->email }}">
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