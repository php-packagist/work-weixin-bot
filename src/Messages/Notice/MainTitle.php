<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * Main Title of the Card data format
 */
class MainTitle extends AbstractNotice
{
    /**
     * title
     * propose:No more than 26 words
     *
     * @var string
     */
    protected string $title;

    /**
     * description
     * propose:No more than 30 words
     *
     * @var string
     */
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
