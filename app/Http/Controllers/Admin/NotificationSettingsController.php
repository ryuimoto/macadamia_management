<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Mail;
use Carbon\Carbon;

use App\User;
use App\Shift;
use App\LineNotification;
use App\MailNotification;

class NotificationSettingsController extends Controller
{
    public function index()
    {
        $detault_line_setting = LineNotification::first();
        $default_mail_setting = MailNotification::first();

        return view('admin.notification_settings')->with([
            'detault_line_setting' => $detault_line_setting,
            'default_mail_setting' => $default_mail_setting,
        ]);
    }

    public function post(Request $request)
    {
        if(isset($request->line_test))
        {
            return $this->lineTest($request);
        }else if($request->mail_test){
            return $this->mailTest($request);
        }else if(isset($request->line_setting))
        {
            return $this->lineSetting($request);
        }else if(isset($request->mail_setting)){
            return $this->mailSetting($request);
        }
    }

    public function lineTest(Request $request)
    {
        $httpClient = new CurlHTTPClient(config('line.line-access-token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);

        if(isset($request->send_working_hours))
        {
            $carbon = new Carbon('2020-04-01');
            $today = new Carbon();

            $users = User::get();

            $array = [];
    
            $working_days = [];
    
            foreach($users as $key => $user)
            {
                $result = 0;
    
                $shifts = Shift::where('user_id',$key+1)
                ->whereYear('date','=',$carbon->year)
                ->whereMonth('date','=',$carbon->month)
                ->where('date','<',$today)->get();
    
                $working_days[] = $shifts->count();
    
                foreach($shifts as $shift)
                {
                    $result += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
                }
    
                $array[] = $result;
            }

            $data = '';
            $greeting = "お疲れ様です。\n".$carbon->year."年".$carbon->month."月の出勤簿のデータを送ります。\n\n";

            foreach($users as $key => $user)
            {
                $data .= $user->name." さんは";
                $data .= $array[$key]."時間\n";

                // $sentence = $user->name."さんは".$array[$key];
            }

            $sentence = $greeting.$data;

            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($sentence);

            $response = $bot->pushMessage('U43acfcbc373087f4de9afd6573c91e9e', $textMessageBuilder);
            // $response = $bot->pushMessage('U7f79978a6766f639f7a008015a601300', $textMessageBuilder); // 川内さん

        }else{
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($request->line_text);

            $response = $bot->pushMessage('U43acfcbc373087f4de9afd6573c91e9e', $textMessageBuilder);
        }

        return back()->with([
            'line_post' => 'メッセージを送りました。LINEを確認してください',
        ]);
    }

    public function lineSetting(Request $request)
    {
        $request->validate([
            'contents' => 'max:144',  
        ]);

        LineNotification::where('id',1)
        ->update([
            'notification_flag' => $request->notification_flag,
            'day_of_the_day' => $request->day_of_the_day,
            'day_of_the_time' => $request->day_of_the_time,
            'contents' => $request->contents,
        ]);

        return back();
    }
    
    public function mailTest(Request $request)
    {
        
        Mail::send('emails.test',$request->mail_text,function($message){
            $message->to($request->mail_address, 'Test')
            ->subject('送信確認メール');
        });

        return back()->with([
            'mail_post' => 'メールを送信しました。確認してくみてください.',
        ]);
    }

    public function mailSetting(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contentent' => 'requiremax:144',
        ]);

        MailNotification::where('id',1)->update([
            'notification_flag' => $request->notification_flag,
            'day_of_the_day' => $request->day_of_the_day,
            'day_of_the_time' => $request->day_of_the_time,
            'contents' => $request->contents,
        ]);

        return back();
    }
    
}