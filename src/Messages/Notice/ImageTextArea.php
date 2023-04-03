<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * Image on the Left, Text on the Right Format
 */
class ImageTextArea extends AbstractNotice
{
    // 0:not click action
    public const TYPE_DEFAULT = 0;
    // 1:open the webpage
    public const TYPE_URL = 1;
    // 2:open the mini program
    public const TYPE_APP = 2;

    /**
     * 0:not click action
     * 1:open the webpage
     * 2:open the mini program
     *
     * @var int
     */
    protected int $type;

    /**
     * link url
     *
     * @var string
     */
    protected string $url;

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

    /**
     * image url
     *
     * @var string
     */
    protected string $imageUrl;

    /**
     * mini program appid
     * if type is 2, this field is required
     *
     * @var string
     */
    protected string $appId;

    /**
     * mini program page path
     * if type is 2, this field is required
     *
     * @var string
     */
    protected string $pagepath;

    public function __construct(int $type = self::TYPE_DEFAULT, string $title = '', string $desc = '', string $imageUrl = '', string $url = '', string $appId = '', string $pagepath = '')
    {
        $this->setType($type)->setTitle($title)->setDesc($desc)->setImageUrl($imageUrl)->setUrl($url)->setAppId($appId)->setPagepath($pagepath);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        switch ($this->getType()) {
            case self::TYPE_DEFAULT:
                return [
                    'type'      => $this->getType(),
                    'title'     => $this->getTitle(),
                    'desc'      => $this->getDesc(),
                    'image_url' => $this->getImageUrl(),
                ];
            case self::TYPE_URL:
                return [
                    'type'      => $this->getType(),
                    'title'     => $this->getTitle(),
                    'desc'      => $this->getDesc(),
                    'image_url' => $this->getImageUrl(),
                    'url'       => $this->getUrl(),
                ];
            case self::TYPE_APP:
                return [
                    'type'      => $this->getType(),
                    'title'     => $this->getTitle(),
                    'desc'      => $this->getDesc(),
                    'image_url' => $this->getImageUrl(),
                    'appid'     => $this->getAppId(),
                    'pagepath'  => $this->getPagepath(),
                ];
        }
        return [];
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return ImageTextArea
     */
    public function setType(int $type): ImageTextArea
    {
        $this->type = $type;
        return $this;
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
     * @return ImageTextArea
     */
    public function setUrl(string $url): ImageTextArea
    {
        $this->url = $url;
        return $this;
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
     * @return ImageTextArea
     */
    public function setTitle(string $title): ImageTextArea
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
     * @return ImageTextArea
     */
    public function setDesc(string $desc): ImageTextArea
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     *
     * @return ImageTextArea
     */
    public function setImageUrl(string $imageUrl): ImageTextArea
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     *
     * @return ImageTextArea
     */
    public function setAppId(string $appId): ImageTextArea
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPagepath(): string
    {
        return $this->pagepath;
    }

    /**
     * @param string $pagepath
     *
     * @return ImageTextArea
     */
    public function setPagepath(string $pagepath): ImageTextArea
    {
        $this->pagepath = $pagepath;
        return $this;
    }
}
