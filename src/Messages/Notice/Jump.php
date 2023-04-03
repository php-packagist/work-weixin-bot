<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * Jump data format
 */
class Jump extends AbstractSubMessage
{
    // 1: jump to the specified URL
    public const TYPE_URL = 1;
    // 2: jump to the specified mini program
    public const TYPE_APP = 2;

    /**
     * 1: jump to the specified URL
     * 2: jump to the specified mini program
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
     * mini program appid
     *
     * @var string
     */
    protected string $appId;

    /**
     * mini program page path
     *
     * @var string
     */
    protected string $pagepath;

    public function __construct(int $type = self::TYPE_URL, string $url = '', string $title = '', string $appId = '', string $pagepath = '')
    {
        $this->setType($type)->setUrl($url)->setTitle($title)->setAppId($appId)->setPagepath($pagepath);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        switch ($this->getType()) {
            case self::TYPE_URL:
                return [
                    'type'  => $this->getType(),
                    'url'   => $this->getUrl(),
                    'title' => $this->getTitle(),
                ];
            case self::TYPE_APP:
                return [
                    'type'     => $this->getType(),
                    'appid'    => $this->getAppId(),
                    'pagepath' => $this->getPagepath(),
                    'title'    => $this->getTitle(),
                ];
        }
        return [];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Jump
     */
    public function setType(string $type): Jump
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
     * @return Jump
     */
    public function setUrl(string $url): Jump
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
     * @return Jump
     */
    public function setTitle(string $title): Jump
    {
        $this->title = $title;
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
     * @return Jump
     */
    public function setAppId(string $appId): Jump
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
     * @return Jump
     */
    public function setPagepath(string $pagepath): Jump
    {
        $this->pagepath = $pagepath;
        return $this;
    }
}
