<?php

namespace PhpPackagist\WorkWeixinBot\Messages\News;

use PhpPackagist\WorkWeixinBot\Messages\SubMessage;

/**
 * News Message articles item class
 */
class Article extends SubMessage
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
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->picurl = $picurl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'picurl' => $this->picurl,
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
     * @param  string  $title
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
     * @param  string  $description
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
     * @param  string  $url
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
     * @param  string  $picurl
     *
     * @return Article
     */
    public function setPicurl(string $picurl): Article
    {
        $this->picurl = $picurl;
        return $this;
    }
}
