<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\News;

class NewsNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @param  array{News\Article}  $articles
     * @return void
     */
    public function __construct(array $articles)
    {
        parent::__construct(new News($articles));
    }
}
