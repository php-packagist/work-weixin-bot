<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\Image;

class ImageNotification extends Notification
{
    /**
     * Create a new image notification instance.
     */
    public function __construct(string $file)
    {
        parent::__construct(new Image($file));
    }
}
