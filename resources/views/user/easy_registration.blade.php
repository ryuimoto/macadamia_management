@extends('user.layouts.main_layout')
@section('title')
    MM|簡単登録
@endsection
@section('contents')
  <div class="content-wrapper">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
    @endif
    <div class="row">
      <div class="col-10 offset-md-1 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">簡単登録</h4>
            <form class="form-sample" method="POST" action="{{ route('user.easy_registration') }}">
              @csrf
              <p class="card-description"> 編集や削除がある場合は「シフト」からおこなってください </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">出勤時間</label>
                    <div class="col-sm-8">
                      <input type="time" name="attendance" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">退勤時間</label>
                    <div class="col-sm-8">
                      <input type="time" name="leaving" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">出勤曜日</label>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="monday"> 月 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="tuesday"> 火</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="wednesday"> 水 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="thursday"> 木 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="friday"> 金 </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-sm-2 offset-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="6"> 土 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="7"> 日 </label>
                      </div>
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
  </div>
@endsection
