<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use Carbon\Carbon;

use App\LineNotification;
use App\Shift;
use App\User;

class UserLineCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userLine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send line to user';

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
        $carbon = new Carbon('2020-04-01'); 
        $today = new Carbon();

        $httpClient = new CurlHTTPClient(config('line.line-access-token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);

        $users = User::where('line_notification',true)->get();

        $array = [];

        foreach($users as $key => $user)
        {
            $result = 0;

            $shifs = Shift::where('user_id',$user->id)
            ->whereYear('date','=',$carbon->year)
            ->whereMonth('date','=',$carbon->month)
            ->where('date','<',$carbon->parse())->get();

            foreach($shifs as $shift)
            {
                $result += (strtotime($shift->attendance) - strtotime($shift->leaving)) / -3600;
            }

            $array[] = $result;

        }

        $data = '';

        $greeting = "お疲れ様です。\n".$carbon->year."年".$carbon->month."月の出勤簿のデータを送ります。\n\n";

        foreach($users as $user)
        {
            if(isset($user->line_user_id))
            {
                $data .= $user->name."さんは";
                $data .= $array[$user->id]."時間\n";
    
                $sentence = $greeting.$data;
    
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($sentence);
    
                $response = $bot->pushMessage($user->line_user_id,$textMessageBuilder);
            }

        }

        // dump($array);
    }
}
