@extends('admin.layouts.main_layout')
@section('title')
    MM管理画面|スーパーバイザー登録
@endsection
@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">スーパーバイザー登録</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Forms</div>
                <div class="panel-body">
                    <form action="{{ route('admin.super_visor') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>名前</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>メールアドレス</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    登録リスト
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body articles-container">
                        <div class="article border-bottom">
                            <div class="col-xs-12">
                                <div class="row">
                                    @forelse ($super_visors as $super_visor)
                                        <div class="col-xs-12 col-md-12">
                                            <h4><a href="{{ route('admin.super_visor_details',$super_visor->id) }}">{{ $super_visor->name }}</a></h4>
                                            <p>{{ $super_visor->email }}</p>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div><!--End .article-->
                    </div>
            </div><!--End .articles-->
        </div>
    </div>
@endsection
@section('script')
<script>
    $("#super_visor").addClass("active");
</script>
@endsection