@extends('user.layouts.main_layout')
@section('title')
    MM|設定
@endsection
@section('contents')
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">通知</h4>
            <p class="card-description"> メール配信 </p>
            <form class="forms-sample" method="POST" action="{{ route('user.setting') }}">
              @csrf
              @method('put')
              <div class="form-group row">
                <div class="col-sm-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">給料日前に労働時間の通知をする</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="mail_end_of_month_notification" id="membershipRadios1" value="1" checked> 通知する 
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="mail_end_of_month_notification" id="membershipRadios2" value="0"> 通知しない 
                          </label>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <p class="card-description"> LINE配信 </p>
              <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">月末に労働時間の通知をする</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="line_end_of_month_notification" id="membershipRadios1" value="1" checked> 通知する </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="line_end_of_month_notification" id="membershipRadios2" value="0"> 通知しない </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">編集する</button>
            </form>
            
          </div>
        </div>
      </div>
@endsection