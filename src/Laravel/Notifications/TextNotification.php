<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\Text;

class TextNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message, array $mentionedMobileList = [], array $mentionedList = [])
    {
        parent::__construct(new Text($message, $mentionedMobileList, $mentionedList));
    }
}
