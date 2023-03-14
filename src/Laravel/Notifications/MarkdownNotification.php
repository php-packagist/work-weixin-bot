<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\Message;
use PhpPackagist\WorkWeixinBot\Messages\Markdown;

class MarkdownNotification extends Notification
{
    protected Message $message;

    /**
     * Create a new markdown notification instance.
     *
     * @param  string  $message markdown message
     *
     * @return void
     */
    public function __construct(string $message)
    {
        parent::__construct(new Markdown($message));
    }
}
