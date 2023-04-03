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
     * @return CardAction
     */
    public function setType(int $type): CardAction
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
     * @return CardAction
     */
    public function setUrl(string $url): CardAction
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
     * @return CardAction
     */
    public function setAppid(string $appid): CardAction
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
     * @return CardAction
     */
    public function setPagepath(string $pagepath): CardAction
    {
        $this->pagepath = $pagepath;
        return $this;
    }
}
