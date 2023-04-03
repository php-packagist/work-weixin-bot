<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

class MainTitle extends AbstractSubMessage
{
    protected string $title;

    protected string $description;

    public function __construct(string $title = '', string $description = '')
    {
        $this->title       = $title;
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'       => $this->title,
            'description' => $this->description,
        ];
    }
}
