@extends('user.layouts.main_layout')
@section('title')
    MM|アカウント編集
@endsection
@section('contents')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">アカウント編集</h4>
            <p class="card-description"> Basic form elements </p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputName1">サムネイル</label>
                <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                    <label>
                      <input type="file" hidden />
                      <img class="rounded-circle" src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face1.jpg') }}" alt="profile">
                    </label>
                  </div>
                </a>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">名前</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">ステータス</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">メールアドレス</label>
                <input type="email" class="form-control" id="exampleInputPassword4" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">パスワード</label>
                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="パスワード">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">パスワードの確認</label>
                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="パスワードの確認">
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">編集する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection