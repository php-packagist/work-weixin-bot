<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use PhpPackagist\WorkWeixinBot\Messages\Message;

/**
 * @method static \PhpPackagist\WorkWeixinBot\Response send(Message $message)
 * @method static \PhpPackagist\WorkWeixinBot\Bot      driver(string $driver = null)
 */
class WorkWeixinBot extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'work-weixin-bot';
    }
}
