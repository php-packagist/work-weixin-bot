<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Laravel\Messages\Text;
use PhpPackagist\WorkWeixinBot\Laravel\Messages\Message;

class TextNotification extends Notification
{
    protected Message $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message, string $app = 'default', $delay = null)
    {
        parent::__construct(new Text($message), $app, $delay);
    }
}
