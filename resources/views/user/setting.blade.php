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
            <form class="forms-sample">
              <div class="form-group row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">月末に労働時間のお知らせをする</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> 通知する </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> 通知しない </label>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">毎月27日に労働時間を確認するよう促す</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> 通知する </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> 通知しない </label>
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