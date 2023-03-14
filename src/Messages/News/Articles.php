<?php

namespace PhpPackagist\WorkWeixinBot\Messages\News;

use PhpPackagist\WorkWeixinBot\Messages\Message;

/**
 * News Message articles item class
 */
class Articles extends Message
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
     * @return Articles
     */
    public function setTitle(string $title): Articles
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
     * @return Articles
     */
    public function setDescription(string $description): Articles
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
     * @return Articles
     */
    public function setUrl(string $url): Articles
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
     * @return Articles
     */
    public function setPicurl(string $picurl): Articles
    {
        $this->picurl = $picurl;
        return $this;
    }
}
