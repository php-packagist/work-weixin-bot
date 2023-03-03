<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Handler;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class LogHandler extends AbstractProcessingHandler
{

    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        echo '<pre>';print_r('123213213');exit();
    }
}
