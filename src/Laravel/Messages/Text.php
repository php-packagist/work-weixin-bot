<?php

namespace PhpPackagist\WorkWeixinBot\Laravel\Messages;

class Text extends Message
{
    protected string $content;

    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    public function toArray(): array
    {
        return [
            'msgtype' => 'text',
            'text'    => [
                'content' => $this->content,
            ],
        ];
    }
}
