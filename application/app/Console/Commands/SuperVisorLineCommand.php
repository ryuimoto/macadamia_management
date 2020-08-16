<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use Carbon\Carbon;

use App\User;
use App\Shift;
use App\SuperVisor;

class SuperVisorLineCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supervisor:lineNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send line to supervisor';

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
        $carbon = new Carbon();

        $httpClient = new CurlHTTPClient(config('line.line-access-token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);

        $super_virsors = SuperVisor::where('line_notification',true)->get();

        foreach($super_virsors as $super_virsor)
        {
            if($super_virsor->line_notification)
            {
                
            }
        }

    }
}
