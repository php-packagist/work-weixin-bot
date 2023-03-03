<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Laravel\Messages\Image;

class ImageNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        parent::__construct(new Image($file));
    }
}
