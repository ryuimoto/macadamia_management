@extends('user.layouts.main_layout')
@section('title')
    MM|シフト作成
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
                var registConfirm = confirm("シフトを登録します。よろしいですか？");

                // var post_data =  new Array(document.forms['pettern_post'],arg.start);
                var post_data = $('#pettern_post [name=select_pettern]').val();
        
                if(registConfirm == true)
                {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('user.shift_create') }}",
                        type: 'POST',
                        data: {
                            'pettern' : post_data,
                            // 'date' : arg.start.toISOString().split('T')[0],
                            'date' : arg.start.toLocaleString().split('T')[0],
                        },
                    })
                    // Ajaxリクエストが成功した場合
                    .done(function(data) {
                        // $('.delete_message').text(data.responseJSON);
                        // console.log(data);
                        window.location.reload();
                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function() {
                        alert("一日に複数のシフトは入れられません");
                    });
                    
                }
                
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
                        title: '{{ date('G:i',strtotime($shift->attendance)) }}〜{{ date('G:i',strtotime($shift->leaving)) }}',
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
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">シフトを作成</h4>
                <p class="card-description"> シフトパターンを選択してください </p>
                <form class="forms-sample" id="pettern_post">
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">パターン</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="select_pettern">
                        @forelse ($shift_petterns as $shift_pettern)
                         <option value="{{ $shift_pettern->id }}">【{{ $shift_pettern->name }}】{{ date('G:i',strtotime($shift_pettern->attendance)) }}〜{{ date('G:i',strtotime($shift_pettern->leaving)) }}</option>
                         @empty
                        @endforelse
                    </select>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <div id='calendar'></div>
    </div>
@endsection

