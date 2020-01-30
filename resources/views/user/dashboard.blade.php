@extends('user.layouts.main_layout')
@section('title')
  MM|ダッシュボード
@endsection
@section('contents')
  <div class="content-wrapper">
    <i id="bannerClose"></i>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
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
      <div class="col-md-4 stretch-card grid-margin">
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
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">休日日数 <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">95,5741</h2>
            <h6 class="card-text">Increased by 5%</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">本日出勤予定のスタッフ</h4>
            <small class="text-muted"> ●●月●●日 </small>
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
                  <tr>
                    <td>
                      <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face1.jpg') }}" class="mr-2" alt="image"> David Grey </td>
                    <td> Fund is not recieved </td>
                    <td>
                      <label class="badge badge-gradient-success">DONE</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face2.jpg') }}" class="mr-2" alt="image"> Stella Johnson </td>
                    <td> High loading time </td>
                    <td>
                      <label class="badge badge-gradient-warning">PROGRESS</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face3.jpg') }}" class="mr-2" alt="image"> Marina Michel </td>
                    <td> Website down for one week </td>
                    <td>
                      <label class="badge badge-gradient-info">ON HOLD</label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face4.jpg') }}" class="mr-2" alt="image"> John Doe </td>
                    <td> Loosing control on server </td>
                    <td>
                      <label class="badge badge-gradient-danger">REJECTED</label>
                    </td>
                  </tr>
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
  <!-- Plugin js for this page -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/hoverable-collapse.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/todolist.js') }}"></script>
  <!-- End custom js for this page -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/js/vendor.bundle.base.js') }}"></script>

  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/js/chart.js') }}"></script>
@endsection