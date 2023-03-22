<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Channels;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Notifications\Notification;
use PhpPackagist\WorkWeixinBot\Laravel\Contracts\Channel;
use PhpPackagist\WorkWeixinBot\Laravel\Facades\WorkWeixinBot;

class WorkWechatChannel implements Channel
{
    const CHANNELS_NAME = 'work-wechat-bot';

    public function send($notifiable, Notification $notification)
    {
        if (! method_exists($notification, 'toWorkWechat')) {
            return false;
        }

        $messages = $notification->toWorkWechat($notifiable);

        if (! ($bot = $notifiable->routeNotificationFor(self::CHANNELS_NAME))) {
            return false;
        }

        try {
            return WorkWeixinBot::driver($bot)->send($messages);
        } catch (GuzzleException $e) {
            return false;
        }
    }
}
