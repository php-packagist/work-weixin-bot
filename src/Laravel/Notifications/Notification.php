<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification as BaseNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Messages\Message;

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
    public function via(AnonymousNotifiable $notifiable): array
    {
        return ['work-wechat-bot'];
    }

    /**
     * Get the notification's message
     *
     * @param mixed $notificable
     *
     * @return Message
     */
    public function toWorkWechat(AnonymousNotifiable $notificable): Message
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
    public function toArray(AnonymousNotifiable $notifiable): array
    {
        return [
            'via'     => 'work-wechat-bot',
            'message' => $this->message->toArray(),
        ];
    }
}
