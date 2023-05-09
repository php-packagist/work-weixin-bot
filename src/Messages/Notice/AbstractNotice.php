<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Concerns\Makeable;
use PhpPackagist\WorkWeixinBot\Contracts\MessageInterface;

abstract class AbstractNotice implements MessageInterface
{
    use Makeable;
}
