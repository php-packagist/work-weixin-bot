<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use PhpPackagist\WorkWeixinBot\Messages\File;

class FileNotification extends Notification
{
    /**
     * Create a new file notification instance.
     *
     * @return void
     */
    public function __construct(string $media_id)
    {
        parent::__construct(new File($media_id));
    }
}
