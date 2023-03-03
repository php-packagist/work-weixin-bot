<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Messages;

class Markdown extends Message
{
    protected string $content;

    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    public function toArray(): array
    {
        return [
            'msgtype' => 'markdown',
            'markdown' => [
                'content' => $this->content,
            ],
        ];
    }
}
