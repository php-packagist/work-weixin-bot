<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * emphasis data format
 */
class EmphasisContent extends AbstractNotice
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
     * @return EmphasisContent
     */
    public function setTitle(string $title): EmphasisContent
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
     * @return EmphasisContent
     */
    public function setDesc(string $desc): EmphasisContent
    {
        $this->desc = $desc;
        return $this;
    }
}
