<?php

namespace PhpPackagist\WorkWeixinBot\Concerns;

trait Makeable
{
    /**
     * Make a message.
     *
     * @param ...$args
     *
     * @return static
     */
    public static function make(...$args): self
    {
        return new static(...$args);
    }
}
