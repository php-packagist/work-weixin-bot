<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Laravel\Messages\Message;
use PhpPackagist\WorkWeixinBot\Laravel\Messages\Text;

class TextNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message)
    {
        parent::__construct(new Text($message));
    }
}
