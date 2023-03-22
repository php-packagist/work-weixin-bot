<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as BaseNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Channels\WorkWeixinChannel;
use PhpPackagist\WorkWeixinBot\Messages\AbstractMessage;

class Notification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    protected AbstractMessage $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(AbstractMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable): array
    {
        return [WorkWeixinChannel::CHANNELS_NAME];
    }

    /**
     * Get the notification's message
     *
     * @param mixed $notificable
     *
     * @return AbstractMessage
     */
    public function toWorkWechat($notificable): AbstractMessage
    {
        return $this->message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'via'     => WorkWeixinChannel::CHANNELS_NAME,
            'message' => $this->message->toArray(),
        ];
    }
}
