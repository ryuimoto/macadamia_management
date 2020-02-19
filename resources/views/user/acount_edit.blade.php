@extends('user.layouts.main_layout')
@section('title')
  MM|アカウント編集
@endsection
@section('contents')
  <div class="content-wrapper">
    <div class="row">
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </ul>
        </div>
      @endif
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">アカウント編集</h4>
            <p class="card-description"> サムネイルを編集する場合は画像をクリックしてください </p>
            <form class="forms-sample" method="POST" action="{{ route('user.acount_edit') }}" enctype="multipart/form-data" >
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">サムネイル</label>
                <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                    <label>
                      <input type="file" name="image_name" hidden />
                      {{-- <img class="rounded-circle" src="{{ asset('library/PurpleAdmin-Free-Admin-Template-master/assets/images/faces/face1.jpg') }}" alt="profile"> --}}
                      @if ($is_image)
                        <img class="rounded-circle" src="/storage/profile_images/{{ $username->image_name }}" width="100" height="100" alt="profile">
                      @else
                        <img class="rounded-circle" src="{{ asset('img/dummy.png') }}" width="100" height="100" alt="profile">
                      @endif
                    </label>
                  </div>
                </a>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">名前</label>
                <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{ $name }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">ステータス</label>
                <select class="form-control form-control-sm" name="status_id">
                  @forelse ($statuses as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @empty
                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">メールアドレス</label>
                <input type="email" class="form-control" id="exampleInputPassword4" name="email" placeholder="Email" value="{{ $email }}">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">パスワード</label>
                <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="パスワード">
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">パスワードの確認</label>
                <input type="password" class="form-control" id="exampleInputPassword4" name="password_confirmation" placeholder="パスワードの確認">
              </div>
              <button type="submit" class="btn btn-gradient-primary mr-2">編集する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection