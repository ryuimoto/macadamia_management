<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Carbon\Carbon;

use App\User;
use App\Shift;
use App\LineNotification;

class TestParentNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestParentNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send time to client(Test)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $httpClient = new CurlHTTPClient(config('line.line-access-token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);

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

    }
}
