<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * card click action
 */
class CardAction extends AbstractNotice
{
    // 0: open the webpage
    public const TYPE_URL = 1;

    // 1: open the mini program
    public const TYPE_APP = 2;

    /**
     * @var int 0: open the webpage 1: open the mini program
     */
    protected int $type;

    /**
     * link url
     *
     * @var string
     */
    protected string $url;

    /**
     * mini program appid
     *
     * @var string
     */
    protected string $appid;

    /**
     * mini program page path
     *
     * @var string
     */
    protected string $pagepath;

    public function __construct(int $type = 0, string $url = '', string $appid = '', string $pagepath = '')
    {
        $this->setType($type)->setUrl($url)->setAppid($appid)->setPagepath($pagepath);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        switch ($this->getType()) {
            case self::TYPE_URL:
                return [
                    'type' => $this->getType(),
                    'url'  => $this->getUrl(),
                ];
            case self::TYPE_APP:
                return [
                    'type'     => $this->getType(),
                    'appid'    => $this->getAppid(),
                    'pagepath' => $this->getPagepath(),
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
    public function getAppid(): string
    {
        return $this->appid;
    }

    /**
     * @param string $appid
     *
     * @return self
     */
    public function setAppid(string $appid): self
    {
        $this->appid = $appid;

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
