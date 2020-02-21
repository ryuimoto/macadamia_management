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
                        title: '{{ $shift->user->name }}さん　　{{ date('G:i',strtotime($shift->attendance)) }}〜{{ date('G:i',strtotime($shift->leaving)) }}',
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

        /*一応幅を決めておきます*/
        input[type="date"] {

            /*忘れずに書きましょう。*/
            position: relative;
        }
        
        input[type="date"]::-webkit-inner-spin-button{
            -webkit-appearance: none;
        }
        
        input[type="date"]::-webkit-clear-button{
            -webkit-appearance: none;
        }

        input[type=date]::-webkit-calendar-picker-indicator {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
@endsection
@section('contents')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('attendance'))
                            <span class="help-block">
                                <strong>{{ $errors->first('attendance') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('leaving'))
                            <span class="help-block">
                                <strong>{{ $errors->first('leaving') }}</strong>
                            </span>
                        @endif
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
                                @forelse ($my_shifts as $my_shift)
                                    <form id="{{ $my_shift->id }}" name="form1" method="POST" action="{{ route('user.shift_list') }}">
                                        @csrf
                                        @method('put')
                                        <tr>
                                            <td class="py-1">
                                            <input type="hidden" name="old_date" value="{{ $my_shift->date }}">
                                            <input type="date" data-provide="datepicker" class="form-control form-control-sm" name="date" value="{{ $my_shift->date }}">
                                            </td>
                                            <td> <input type="time" name="attendance" class="form-control form-control-sm" value="{{ $my_shift->attendance }}"> </td>
                                            <td> <input type="time" name="leaving" class="form-control form-control-sm" value="{{ $my_shift->leaving }}"> </td>
                                            <td width="25%">
                                            {{-- <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">バトンタッチ</button>
                                            <div class="dropdown-menu">
                                                @forelse ($baton_passing_users as $baton_passing_user)
                                                    <a class="dropdown-item" href="javascript:form1.submit()" value="{{ $baton_passing_user->id }}">{{ $baton_passing_user->name }}さん</a>
                                                @empty
                                                @endforelse
                                            </div> --}}
                                            <button type="submit" class="btn btn-gradient-primary btn-fw" name="put" value="{{ $my_shift->id }}">編集</button>
                                            <button type="submit" class="btn btn-gradient-danger btn-fw" name="delete" value="{{ $my_shift->id }}">削除</button> 
                                            </td>
                                        </tr>
                                    </form>
                                    @empty
                                    <p>シフトが登録されていません</p>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-7 offset-md-5">
                                {{ $my_shifts->links() }}
                            </div>
                        </div>
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

