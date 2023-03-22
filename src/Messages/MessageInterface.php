<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

interface MessageInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
