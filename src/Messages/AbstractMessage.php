<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Concerns\Makeable;
use PhpPackagist\WorkWeixinBot\Contracts\MessageInterface;

abstract class AbstractMessage implements MessageInterface
{
    use Makeable;

//    /**
//     * Make a message.
//     *
//     * @param ...$args
//     *
//     * @return MessageInterface
//     */
//    public static function make(...$args): MessageInterface
//    {
//        return new static(...$args);
//    }
}
