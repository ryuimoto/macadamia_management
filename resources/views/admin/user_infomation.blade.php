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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">スタッフリスト</div>
                <div class="panel-body btn-margins">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td><a href="{{ route('admin.staff_info_details',$user->id) }}">{{ $user->id }}</a></td>
                                        <td><a href="{{ route('admin.staff_info_details',$user->id) }}">{{ $user->name }}</a></td>
                                        <td><a href="{{ route('admin.staff_info_details',$user->id) }}">{{ $user->email }}</a></td>
                                    </tr>
                                @empty
                                    <p>ユーザーがいません</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#staff_info").addClass("active");
    </script>
@endsection