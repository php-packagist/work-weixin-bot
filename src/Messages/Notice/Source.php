<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * source data format
 */
class Source extends AbstractSubMessage
{
    // 0:gray
    public const COLOR_GRAY = 0;
    // 1:black
    public const COLOR_BLACK = 1;
    // 2:red
    public const COLOR_RED = 2;
    // 3:green
    public const COLOR_GREEN = 3;

    /**
     * icon url
     *
     * @var string
     */
    protected string $icon_url;

    /**
     * description
     *
     * @var string
     */
    protected string $desc;

    /**
     * description color
     * 0:gray
     * 1:black
     * 2:red
     * 3:green
     *
     * @var int
     */
    protected int $desc_color;

    public function __construct(string $icon_url = '', string $desc = '', $desc_color = self::COLOR_GRAY)
    {
        $this->setIconUrl($icon_url);
        $this->setDesc($desc);
        $this->setDescColor($desc_color);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'icon_url'   => $this->getIconUrl(),
            'desc'       => $this->getDesc(),
            'desc_color' => $this->getDescColor(),
        ];
    }

    /**
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->icon_url;
    }

    /**
     * @param string $icon_url
     *
     * @return Source
     */
    public function setIconUrl(string $icon_url): Source
    {
        $this->icon_url = $icon_url;
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
     * @return Source
     */
    public function setDesc(string $desc): Source
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return int
     */
    public function getDescColor(): int
    {
        return $this->desc_color;
    }

    /**
     * @param int $desc_color
     *
     * @return Source
     */
    public function setDescColor(int $desc_color): Source
    {
        $this->desc_color = $desc_color;
        return $this;
    }
}
