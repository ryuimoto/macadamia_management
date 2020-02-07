@extends('user.layouts.main_layout')
@section('title')
    MM|シフト一覧
@endsection
@section('fullcalendar_library')
    <link href='{{ asset('library/packages/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('library/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('library/packages/timegrid/main.css') }}' rel='stylesheet' />
    <script src='{{ asset('library/packages/core/main.js') }}'></script>
    <script src='{{ asset('library/packages/interaction/main.js') }}'></script>
    <script src='{{ asset('library/packages/daygrid/main.js') }}'></script>
    <script src='{{ asset('library/packages/timegrid/main.js') }}'></script>
    {{-- 日本語化ファイル --}}
    <script src='{{ asset('library/packages/core/locales/ja.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var date_now = new Date();
            var date_start = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
            var date_end = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
            var days = ["日", "月", "火", "水", "木", "金", "土"];
            date_end.setMonth(date_end.getMonth()+12);
            var calendar = new FullCalendar.Calendar(calendarEl, {
            local: 'ja',

            plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: '',
            },
            buttonText: {
                prev: "前の月",
                next: "次の月",
                today: "今日"
            },
            defaultDate: date_now,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                // var title = prompt('Event Title:');
                //  console.log(arg.start);

                // if (title) {
                // calendar.addEvent({
                //     title: title,
                //     start: arg.start,
                //     end: arg.end,
                //     allDay: arg.allDay
                // })
                // }
                calendar.unselect()
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                @forelse ($shifts as $shift)
                    {
                        title: '{{ $shift->user->name }}さん',
                        start: '{{ $shift->date }}',
                        end: '{{ $shift->date }}',
                    },
                @empty
                @endforelse  
            ],
            titleFormat: function(obj) { // 年月日を日本語化
                return obj.date.year+"年"+(obj.date.month+1)+"月";
            },
            //曜日のテキストを書き換えます（日〜土）
            columnHeaderText: function(obj) {
                return days[obj.getDay()];
            },
            //イベントのクリック時の処理を加えます
            eventClick: function(obj) {
                alert(obj.event.title);
            },
            });
            calendar.render();
        });
    </script>
    <style>
        body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
        }
    
        #calendar {
        max-width: 900px;
        margin: 0 auto;
        }
    </style>
@endsection
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">マイシフト</h4>
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
                            <form id="{{ $shift->id }}" action="{{ route('user.shift_list') }}" method="POST">
                                @method('put')
                              @csrf
                              <tr>
                                <td class="py-1">
                                  {{ date('m/d', strtotime($shift->date)) }}<?php $date = new \Carbon\Carbon($shift->date); ?>({{ $weekday[$date->dayOfWeek] }})
                                </td>
                                <td> <input type="time" name="attendance" class="form-control form-control-sm" value="{{ $shift->attendance }}"> </td>
                                <td> <input type="time" name="leaving" class="form-control form-control-sm" value="{{ $shift->leaving }}"> </td>
                                <td width="25%">
                                  <button type="submit" class="btn btn-gradient-primary btn-fw" name="put" value="{{ $shift->id }}">編集</button>
                                  <button type="submit" class="btn btn-gradient-danger btn-fw" name="delete" value="{{ $shift->id }}">削除</button> 
                                </td>
                              </tr>
                            </form>
                            @empty
                              <p>パターンが登録されていません</p>
                            @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

