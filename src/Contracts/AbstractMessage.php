<?php

namespace PhpPackagist\WorkWeixinBot\Contracts;

abstract class AbstractMessage implements MessageInterface
{
    /**
     * Make a message.
     *
     * @param ...$args
     *
     * @return MessageInterface
     */
    public static function make(...$args): MessageInterface
    {
        return new static(...$args);
    }
}
