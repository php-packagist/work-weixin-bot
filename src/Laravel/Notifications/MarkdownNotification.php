<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\AbstractMessage;
use PhpPackagist\WorkWeixinBot\Messages\Markdown;

class MarkdownNotification extends Notification
{
    protected AbstractMessage $message;

    /**
     * Create a new markdown notification instance.
     *
     * @param string $message markdown message
     *
     * @return void
     */
    public function __construct(string $message)
    {
        parent::__construct(new Markdown($message));
    }
}
