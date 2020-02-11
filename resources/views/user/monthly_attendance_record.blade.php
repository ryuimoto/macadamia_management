@extends('user.layouts.main_layout')
@section('title')
    MM|月次出勤簿
@endsection
@section('contents')
    <div class="content-wrapper">
        <div class="col-8 offset-md-2 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <h3>　月次出勤簿</h3>
                </div>
                <div class="row">
                    <a href=""><i class="mdi mdi-chevron-double-left" style="font-size:28px;"></i></a>
                    <h3>{{ $year }}年{{ $month }}月</h3>
                    <a href=""><i class="mdi mdi-chevron-double-right" style="font-size:28px;"></i></a>
                </div>
                <p class="card-description">翌月27日になると自動的に担当者に送られます。 </p>
                <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 offset-md-2 col-form-label">労働日数</label>
                      <div class="col-sm-7">
                          <h2>100日</h2>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 offset-md-2 col-form-label">実労働時間</label>
                      <div class="col-sm-7">
                        <h2>100時間</h2>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">出勤ログ</h4>
                    <p class="card-description"> Add class <code>.table-bordered</code>
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> 出勤日 </th>
                                <th> 出勤時間 </th>
                                <th> 退勤時間 </th>
                                <th> 労働時間 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1/2 </td>
                                <td><input type="text" class="form-control form-control-sm"></td>
                                <td>
                                    <input type="text" class="form-control form-control-sm">
                                </td>
                                <td> 100時間 </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> Messsy Adam </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $245.30 </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> John Richards </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $138.00 </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> Peter Meggik </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $ 77.99 </td>
                            </tr>
                            <tr>
                                <td> 5 </td>
                                <td> Edward </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $ 160.25 </td>
                            </tr>
                            <tr>
                                <td> 6 </td>
                                <td> John Doe </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $ 123.21 </td>
                            </tr>
                            <tr>
                                <td> 7 </td>
                                <td> Henry Tom </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                            style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $ 150.00 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection