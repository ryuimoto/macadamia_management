@extends('user.layouts.main_layout')
@section('title')
    MM|一括登録
@endsection
@section('contents')
  <div class="content-wrapper">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
          </ul>
      </div>
    @endif
    <div class="row">
      @if(Session::has('duplication'))
        <div class="row">
          <div class="alert alert-danger col-md-12 offset-md-2">
            <p>{!! Session::get('duplication') !!}</p>
          </div>
        </div>
      @endif
      <div class="col-10 offset-md-1 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">一括登録</h4>
            <form class="form-sample" method="POST" action="{{ route('user.easy_registration') }}">
              @csrf
              <p class="card-description"> 月ごとのシフトを曜日を選んで登録できます。 </p>
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
                      <input type="time" name="leaving" class="form-control" value="{{ old('leaving') }}" />
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
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="1"> 月 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="2"> 火</label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="3"> 水 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="4"> 木 </label>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="5"> 金 </label>
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
                          <input type="checkbox" name="weekday[]" class="form-check-input" value="0"> 日 </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 offset-md-9">
                  <div class="form-group row">
                    <button type="button" class="btn btn-inverse-primary btn-fw" data-toggle="modal" data-target="#exampleModal">登録</button>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">以下の日程で登録します。よろしいですか？</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>選択した項目が1ヶ月のシフトに登録されます。よろしいですか？</p>
            <p>変更がある場合は、「シフト表」から編集してください。</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">登録する</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
            </form>
          </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">シフト</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> 日付 </th>
                            <th> 出勤時間 </th>
                            <th> 退勤時間 </th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($shifts as $shift)
                        <tr>
                          <td class="py-1">
                            {{ date('m/d', strtotime($shift->date)) }}
                          </td>
                          <td> <input type="time" name="name" class="form-control form-control-sm" aria-describedby="basic-addon1" value="{{ $shift->attendance }}"> </td>
                          <td> <input type="time" name="name" class="form-control form-control-sm" aria-describedby="basic-addon1" value="{{ $shift->leaving }}"> </td>
                          <td width="25%">
                            <button type="submit" class="btn btn-gradient-primary btn-fw" name="edit" value="">編集</button>
                            <button type="submit" class="btn btn-gradient-danger btn-fw" name="delete" value="">削除</button> 
                          </td>
                        </tr>
                      @empty
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
