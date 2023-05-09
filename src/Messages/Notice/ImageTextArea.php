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
     * @return self
     */
    public function setType(int $type): self
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
     * @return self
     */
    public function setUrl(string $url): self
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
     * @return self
     */
    public function setImageUrl(string $imageUrl): self
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
     * @return self
     */
    public function setAppId(string $appId): self
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
     * @return self
     */
    public function setPagepath(string $pagepath): self
    {
        $this->pagepath = $pagepath;

        return $this;
    }
}
