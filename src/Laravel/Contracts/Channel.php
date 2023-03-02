<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Contracts;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification;

interface Channel
{
    /**
     * Send the given notification.
     *
     * @param AnonymousNotifiable $notifiable
     * @param Notification        $notification
     */
    public function send(AnonymousNotifiable $notifiable, Notification $notification);
}
