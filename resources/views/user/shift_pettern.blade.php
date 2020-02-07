@extends('user.layouts.main_layout')
@section('title')
    MM|パターン登録
@endsection
@section('contents')
  <div class="content-wrapper">
    <div class="row">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="col-10 offset-md-1 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">新規登録</h4>
            <form class="form-sample" method="POST" action="{{ route('user.registration_pattern') }}">
              @csrf
              <p class="card-description"> 何個でも登録できます </p>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">パターン名</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">出勤時間</label>
                    <div class="col-sm-8">
                      <input type="time" name="attendance" class="form-control" value="{{ old('attendance') }}" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">退勤時間</label>
                    <div class="col-sm-8">
                      <input type="time" name="leaving" class="form-control" value="{{ old('leaving') }}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 offset-md-9">
                  <div class="form-group row">
                    <button type="submit" class="btn btn-inverse-primary btn-fw">登録</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">パターンリスト</h4>
                <p class="card-description"> 編集または削除が可能です
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th> パターン名 </th>
                        <th> 出勤時間 </th>
                        <th> 退勤時間 </th>
                      </tr>
                    </thead>
                    
                      <tbody>
                        @forelse ($petterns as $pettern)
                          <form id="{{ $pettern->id }}" action="{{ route('user.registration_pattern') }}" method="POST">
                            @csrf
                            <tr>
                              <td><div class="col-sm-12"><input type="text" name="name" class="form-control form-control-sm" aria-describedby="basic-addon1" value="{{ $pettern->name }}"></div></td>
                              <td><div class="col-sm-12"><input type="time" name="attendance" class="form-control form-control-sm" aria-describedby="basic-addon1" value="{{ $pettern->attendance }}"></div></td>
                              <td><div class="col-sm-12"><input type="time" name="leaving" class="form-control form-control-sm" aria-describedby="basic-addon1" value="{{ $pettern->leaving }}"></div></td>
                              <td>
                                <button type="submit" class="btn btn-gradient-primary btn-fw" name="put" value="{{ $pettern->id }}">編集</button>
                                <button type="submit" class="btn btn-gradient-danger btn-fw" name="delete" value="{{ $pettern->id }}">削除</button>
                              </td>
                            </tr>
                          </form>
                        @empty
                          <p>パターンが登録されていません</p>
                        @endforelse
                      </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

