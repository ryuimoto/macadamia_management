<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Mail;
use Carbon\Carbon;

use App\User;
use App\Shift;
use App\LineNotification;

class ParentNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ParentNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send time to client';

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
        
    }
}
