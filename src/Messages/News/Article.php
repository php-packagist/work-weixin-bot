<?php

namespace PhpPackagist\WorkWeixinBot\Messages\News;

use PhpPackagist\WorkWeixinBot\Contracts\AbstractSubMessage;

/**
 * News Message articles item class
 */
class Article extends AbstractSubMessage
{
    // title
    protected string $title;

    // description
    protected string $description;

    // link
    protected string $url;

    // image link
    protected string $picurl;

    public function __construct(string $title = '', string $description = '', string $url = '', string $picurl = '')
    {
        $this->setTitle($title)->setDescription($description)->setUrl($url)->setPicurl($picurl);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'       => $this->getTitle(),
            'description' => $this->getDescription(),
            'url'         => $this->getUrl(),
            'picurl'      => $this->getPicurl(),
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
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Article
     */
    public function setDescription(string $description): Article
    {
        $this->description = $description;
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
     * @return Article
     */
    public function setUrl(string $url): Article
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicurl(): string
    {
        return $this->picurl;
    }

    /**
     * @param string $picurl
     *
     * @return Article
     */
    public function setPicurl(string $picurl): Article
    {
        $this->picurl = $picurl;
        return $this;
    }
}
