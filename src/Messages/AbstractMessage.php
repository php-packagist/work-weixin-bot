<?php

namespace PhpPackagist\WorkWeixinBot\Messages;

use PhpPackagist\WorkWeixinBot\Concerns\Makeable;
use PhpPackagist\WorkWeixinBot\Contracts\MessageInterface;

abstract class AbstractMessage implements MessageInterface
{
    use Makeable;
}
