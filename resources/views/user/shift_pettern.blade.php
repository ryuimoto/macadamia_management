@extends('user.layouts.main_layout')
@section('title')
    MM|パターン登録
@endsection
@section('contents')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">パターンリスト</h4>
                    <p class="card-description"> 編集または削除が可能です
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> パターン名 </th>
                                <th> 出勤時間 </th>
                                <th> 退勤時間 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td><div class="col-sm-12"><input type="text" class="form-control" aria-describedby="basic-addon1"></div></td>
                                <td><div class="col-sm-12"><input type="text" class="form-control" aria-describedby="basic-addon1"></div></td>
                                <td><div class="col-sm-12"><input type="text" class="form-control" aria-describedby="basic-addon1"></div></td>
                                <td>
                                    <button type="button" class="btn btn-gradient-primary btn-fw">編集</button>
                                    <button type="button" class="btn btn-gradient-danger btn-fw">削除</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-10 offset-md-1">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">新規登録</h4>
                <form class="form-sample">
                  <p class="card-description"> 何個でも登録できます </p>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">パターン名</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">出勤時間</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">退勤時間</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 offset-md-9">
                      <div class="form-group row">
                        <button type="button" class="btn btn-inverse-primary btn-fw">登録</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection

