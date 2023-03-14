<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Messages\Message;

class CardAction extends Message
{

    protected int $type;

    protected string $url;

    protected string $appid;

    protected string $pagepath;

    public function __construct(int $type = 0, string $url = '', string $appid = '', string $pagepath = '')
    {
        $this->type = $type;
        $this->url = $url;
        $this->appid = $appid;
        $this->pagepath = $pagepath;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type'     => $this->type,
            'url'      => $this->url,
            'appid'    => $this->appid,
            'pagepath' => $this->pagepath,
        ];
    }
}
