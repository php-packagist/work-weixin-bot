<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use PhpPackagist\WorkWeixinBot\Messages\Message;
use Illuminate\Notifications\Notification as BaseNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Channels\WorkWeixinChannel;

class Notification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    protected Message $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message)
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
     * @return Message
     */
    public function toWorkWechat($notificable): Message
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
