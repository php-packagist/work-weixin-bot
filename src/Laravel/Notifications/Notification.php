<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as BaseNotification;
use PhpPackagist\WorkWeixinBot\Laravel\Messages\Message;

class Notification extends BaseNotification implements ShouldQueue
{
    use Queueable;

    protected string $driver;
    protected Message $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message, string $driver = 'default')
    {
        $this->message = $message;
        $this->driver  = $driver;
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
        return ['work-wechat-bot'];
    }

    /**
     * Get the notification's delivery youdu app.
     *
     * @return string
     */
    public function driver(): string
    {
        return $this->driver;
    }

    /**
     * Get the notification's message
     *
     * @param mixed $notificable
     *
     * @return mixed
     */
    public function toWorkWechat($notificable)
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
            'via'     => 'work-wechat-bot',
            'driver'  => $this->driver,
            'message' => $this->message->toArray(),
        ];
    }
}
