@extends('user.layouts.main_layout')
@section('title')
  MM|ダッシュボード
@endsection
@section('contents')
  <div class="content-wrapper">
    <i id="bannerClose"></i>
    <div class="row">
      <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">今月の労働日数 <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">$ 15,0000</h2>
            <h6 class="card-text">Increased by 60%</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">今月の労働時間 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">45,6334</h2>
            <h6 class="card-text">Decreased by 10%</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">本日出勤予定のスタッフ</h4>
            <small class="text-muted"> {{ $today->format('Y年m月d日') }}({{ $weekday[$today->dayOfWeek] }}) </small>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> スタッフ名 </th>
                    <th> 出勤時間 </th>
                    <th> 退勤時間 </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($go_to_work_staffs as $go_to_work_staff)
                    <tr>
                      <td>
                        <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face1.jpg') }}" class="mr-2" alt="image">{{ $go_to_work_staff->user->name }}さん</td>
                      <td> {{ date('G:i', strtotime($go_to_work_staff->attendance )) }} </td>
                      <td>  {{ date('G:i', strtotime($go_to_work_staff->leaving )) }} </td>
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
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">出勤率</h4>
            <canvas id="barChart" style="height:230px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('plugin_js')
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/chart.js') }}"></script>
@endsection