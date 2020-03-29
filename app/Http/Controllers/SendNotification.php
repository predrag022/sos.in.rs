<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class SendNotification extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send()
    {
//        $notificationBuilder = new PayloadNotificationBuilder();
//        $notificationBuilder->setTitle('title')
//            ->setBody('body')
//            ->setSound('sound')
//            ->setBadge('badge');
//
//        $notification = $notificationBuilder->build();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "dNm7UC8qMOA:APA91bEkRkYpyvhxXsl0Q2JcgxwOVzLXWY9TefDLcJiBoK62m98eTtMMDbJXeh3xlPHbyJ-7yISY582tVrKQBrtPHEM5LCCvr0r_5_BuJAnsH_Wc5zOUihQAENMLldPMXmWPA8Eur-K5";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);


    }
}
