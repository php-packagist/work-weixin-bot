<?php

namespace PhpPackagist\WorkWeixinBot\Contracts;

interface MessageInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
