<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;

class PushTestController extends Controller
{
    public function index()
    {
        return view('test.push');
    }

    public function parrot(Request $request)
    {

        // Log::debug($request->all());

        Log::debug($request->header());
        Log::debug($request->input());
        
        if($request->input()['events'][0]['message']['text'] == 'ユーザー通知依頼')
        {
            // Log::debug('通知きてる');
            

        }else if($request->input()['events'][0]['message']['text'] == 'スーパーバイザー通知依頼'){
            // Log::debug('通知きてない');
        }

        

        // // $httpClient = new CurlHTTPClient(env('LINE_ACCESS_TOKEN'));
        // $httpClient = new CurlHTTPClient('N8gAdfGdUxIzyd1V1RiElplZpfK/hIGw6IqQWfqxyMxcoqbm2RbxLTepzpSNhSd0uDpQnJsVJvyw+2sPhmCpsyzBFbcBQ9qO+u9b51izFrHm6nLXWU6TcE1CSwamHJyX+JvgPXom9fSPgddY9Z0XAQdB04t89/1O/w1cDnyilFU=');
        // // $lineBot = new LINEBot($httpClient, ['channelSecret' => env('LINE_CHANNEL_SECRET')]);
        // $lineBot = new LINEBot($httpClient, ['channelSecret' => 'e05c0d5ef7904f3c74605cfbd96ac1da']);

        // $signature = $request->header('x-line-signature');

        // if (!$lineBot->validateSignature($request->getContent(), $signature)) {
        //     abort(400, 'Invalid signature');
        // }

        // $events = $lineBot->parseEventRequest($request->getContent(), $signature);

        // Log::debug($events);

        // foreach ($events as $event) {
        //     if (!($event instanceof TextMessage)) {
        //         Log::debug('Non text message has come');
        //         continue;
        //     }

        //     $replyToken = $event->getReplyToken();
        //     $replyText = $event->getText();
        //     $lineBot->replyText($replyToken, $replyText);
        // }
    }

    public function getUser(Request $request)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('N8gAdfGdUxIzyd1V1RiElplZpfK/hIGw6IqQWfqxyMxcoqbm2RbxLTepzpSNhSd0uDpQnJsVJvyw+2sPhmCpsyzBFbcBQ9qO+u9b51izFrHm6nLXWU6TcE1CSwamHJyX+JvgPXom9fSPgddY9Z0XAQdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'e05c0d5ef7904f3c74605cfbd96ac1da']);
        $response = $bot->getProfile('U43acfcbc373087f4de9afd6573c91e9e');
        if ($response->isSucceeded()) {
            $profile = $response->getJSONDecodedBody();
            // echo $profile['displayName'];
            // echo $profile['pictureUrl'];
            // echo $profile['statusMessage'];

            // dd($profile);
        
        }
    }
}
