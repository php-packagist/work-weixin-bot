<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * Secondary Vertical Content of the Card data format
 */
class VerticalContent extends AbstractNotice
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
     * @return self
     */
    public function setTitle(string $title): self
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
     * @return self
     */
    public function setDesc(string $desc): self
    {
        $this->desc = $desc;

        return $this;
    }
}
