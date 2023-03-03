<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Laravel\Messages\Message;
use PhpPackagist\WorkWeixinBot\Laravel\Messages\Markdown;

class MarkdownNotification extends Notification
{
    protected Message $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message)
    {
        parent::__construct(new Markdown($message));
    }
}
