<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Messages\Message;

class MainTitle extends Message
{
    protected string $title;

    protected string $description;

    public function __construct($title = '',$description = '')
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function toArray():array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}