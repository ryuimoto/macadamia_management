<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushTestController extends Controller
{
    public function index()
    {
        return view('test.push');
    }

    public function post(Request $request)
    {
        // dd($request->all());

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(config('line.line-access-token'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => config('line.line-channel-secret')]);
        
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($request->push_text);

        $response = $bot->pushMessage('U43acfcbc373087f4de9afd6573c91e9e', $textMessageBuilder);

        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    }
}
