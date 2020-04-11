<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class NotificationSettingsController extends Controller
{
    public function index()
    {
        return view('admin.notification_settings');
    }

    public function post(Request $request)
    {
        if(isset($request->line_test))
        {
            return $this->lineTest($request);
        }else if($request->mail_test){
            return $this->mailTest($request);
        }
    }

    public function lineTest(Request $request)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(config('line.line-access-token'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);
        
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($request->line_text);

        $response = $bot->pushMessage('U43acfcbc373087f4de9afd6573c91e9e', $textMessageBuilder);

        // echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

        return back()->with([
            'line_post' => 'メッセージを送りました。LINEを確認してください'
        ]);

    }
    
    public function mailTest(Request $request)
    {

    }

    public function lineBot(Request $request)
    {
        Log::debug($request->header());
        Log::debug($request->input());

        $httpClient = new CurlHTTPClient(config('line.line-access-token'));
        $lineBot = new LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);
        
        $signature = $request->header('x-line-signature');

        if (!$lineBot->validateSignature($request->getContent(), $signature)) {
            abort(400, 'Invalid signature');
        }

        $events = $lineBot->parseEventRequest($request->getContent(), $signature);

        Log::debug($events);

        foreach ($events as $event) {
            if (!($event instanceof TextMessage)) {
                Log::debug('Non text message has come');
                continue;
            }

            $replyToken = $event->getReplyToken();
            $replyText = $event->getText();
            $lineBot->replyText($replyToken, $replyText);
        }

    }

}
