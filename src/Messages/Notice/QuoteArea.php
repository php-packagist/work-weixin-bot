<?php

namespace PhpPackagist\WorkWeixinBot\Messages\Notice;

/**
 * quote area data format
 * Not recommended with EmphasisContent
 */
class QuoteArea extends AbstractNotice
{
    // 0:default not click action
    public const TYPE_DEFAULT = 0;

    // 1:open the webpage
    public const TYPE_URL = 1;

    // 2:open the mini program
    public const TYPE_APP = 2;

    /**
     * 0:default not click action
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

    /**
     * title
     *
     * @var string
     */
    protected string $title;

    /**
     * quote text
     *
     * @var string
     */
    protected string $quoteText;

    public function __construct($type = self::TYPE_DEFAULT, $title = '', $quoteText = '', $url = '', $appId = '', $pagepath = '')
    {
        $this->setType($type)->setTitle($title)->setQuoteText($quoteText)->setUrl($url)->setAppId($appId)->setPagepath($pagepath);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        switch ($this->getType()) {
            case self::TYPE_DEFAULT:
                return [
                    'type'       => $this->getType(),
                    'title'      => $this->getTitle(),
                    'quote_text' => $this->getQuoteText(),
                ];
            case self::TYPE_URL:
                return [
                    'type'       => $this->getType(),
                    'url'        => $this->getUrl(),
                    'title'      => $this->getTitle(),
                    'quote_text' => $this->getQuoteText(),
                ];
            case self::TYPE_APP:
                return [
                    'type'       => $this->getType(),
                    'appid'      => $this->getAppId(),
                    'pagepath'   => $this->getPagepath(),
                    'title'      => $this->getTitle(),
                    'quote_text' => $this->getQuoteText(),
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
     * @return QuoteArea
     */
    public function setType(int $type): QuoteArea
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
     * @return QuoteArea
     */
    public function setUrl(string $url): QuoteArea
    {
        $this->url = $url;

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
     * @return QuoteArea
     */
    public function setAppId(string $appId): QuoteArea
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
     * @return QuoteArea
     */
    public function setPagepath(string $pagepath): QuoteArea
    {
        $this->pagepath = $pagepath;

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
     * @return QuoteArea
     */
    public function setTitle(string $title): QuoteArea
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteText(): string
    {
        return $this->quoteText;
    }

    /**
     * @param string $quote_text
     *
     * @return QuoteArea
     */
    public function setQuoteText(string $quote_text): QuoteArea
    {
        $this->quoteText = $quote_text;

        return $this;
    }
}
