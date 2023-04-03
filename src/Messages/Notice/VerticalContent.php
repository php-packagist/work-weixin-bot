<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * Secondary Vertical Content of the Card data format
 */
class VerticalContent extends AbstractSubMessage
{
    /**
     * title
     *
     * @var string
     */
    protected string $title;

    /**
     * description
     *
     * @var string
     */
    protected string $desc;

    public function __construct(string $title = '', string $desc = '')
    {
        $this->setTitle($title)->setDesc($desc);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'desc'  => $this->getDesc(),
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return VerticalContent
     */
    public function setTitle(string $title): VerticalContent
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     *
     * @return VerticalContent
     */
    public function setDesc(string $desc): VerticalContent
    {
        $this->desc = $desc;
        return $this;
    }
}
