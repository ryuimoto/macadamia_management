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
                    <a href="{{ route('user.monthly_attandance_record',['year' => $year,'month' => $month]) }}"><i class="mdi mdi-chevron-double-left" style="font-size:28px;"></i></a>
                    <h3>{{ $year }}年{{ $month }}月</h3>
                    <a href="{{ route('user.monthly_attandance_record',['year' => $year,'month' => $month]) }}"><i class="mdi mdi-chevron-double-right" style="font-size:28px;"></i></a>
                </div>
                <p class="card-description">翌月27日になると自動的に担当者に送られます。 </p>
                <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 offset-md-2 col-form-label">労働日数</label>
                      <div class="col-sm-7">
                          <h2>{{ $working_days }}日</h2>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 offset-md-2 col-form-label">実労働時間</label>
                      <div class="col-sm-7">
                        <h2>{{ $total }}時間</h2>
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
                    <p class="card-description">修正や削除は「シフト表」からおこなってください </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> 日付 </th>
                                <th> 出勤時間 </th>
                                <th> 退勤時間 </th>
                                <th> 労働時間 </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shifts as $shift)
                                <?php $date = new \Carbon\Carbon($shift->date);?>
                                <tr>
                                    <td> {{ date('m/d', strtotime($shift->date)) }}({{ $weekday[$date->dayOfWeek] }}) </td>
                                    <td> {{ date('G:i',strtotime($shift->attendance)) }} </td>
                                    <td> {{ date('G:i',strtotime($shift->leaving)) }}</td>
                                    <td> {{ (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600 }}時間</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection