<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

class CardImage extends AbstractSubMessage
{
    /**
     * image url
     *
     * @var string
     */
    protected string $url;

    /**
     * aspect ratio of image.
     * Mast be in the range of 1.3 to 2.25
     * default 1.3
     *
     * @var float
     */
    protected float $aspect_ratio;

    public function __construct(string $url = '', float $aspect_ratio = 1.3)
    {
        $this->setUrl($url)->setAspectRatio($aspect_ratio);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'url'          => $this->getUrl(),
            'aspect_ratio' => $this->getAspectRatio(),
        ];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return CardImage
     */
    public function setUrl(string $url): CardImage
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getAspectRatio(): string
    {
        return $this->aspect_ratio;
    }

    /**
     * @param string $aspect_ratio
     *
     * @return CardImage
     */
    public function setAspectRatio(string $aspect_ratio): CardImage
    {
        $this->aspect_ratio = $aspect_ratio;
        return $this;
    }
}
